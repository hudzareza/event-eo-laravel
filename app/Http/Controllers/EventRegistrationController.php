<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Participant;
use App\Models\Registration;
use Illuminate\Support\Str;

class EventRegistrationController extends Controller
{
    public function store(Request $request, $eventId)
    {
        // ✅ VALIDASI
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'no_telp' => 'nullable|string|max:20',
            'nik' => 'nullable|digits:16',
        ]);

        // ✅ CEK APAKAH PARTICIPANT SUDAH ADA (BY EMAIL)
        $participant = Participant::where('email', $validated['email'])->first();

        if (!$participant) {
            $participant = Participant::create($validated);
        }

        // ✅ CEK SUDAH DAFTAR EVENT INI BELUM
        $alreadyRegistered = Registration::where('event_id', $eventId)
            ->where('participant_id', $participant->id)
            ->exists();

        if ($alreadyRegistered) {
            return back()->with('error', 'Lu udah daftar event ini bro!');
        }

        // dd($participant->id);

        // ✅ SIMPAN REGISTRATION
        Registration::create([
            'event_id' => $eventId,
            'participant_id' => $participant->id,
            'user_id' => 1,
            'status' => 'registered',
            'qr_code' => Str::uuid(), // optional 🔥
        ]);

        return back()->with('success', 'Berhasil daftar event!');
    }
}