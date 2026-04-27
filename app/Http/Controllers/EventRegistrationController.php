<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Registration;
use App\Models\Participant;
use Illuminate\Support\Facades\Storage;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketMail;

class EventRegistrationController extends Controller
{
    public function store(Request $request, $eventId)
    {
        // ✅ VALIDASI (SINGLE USER)
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'no_telp' => 'nullable|string',
            'nik' => 'nullable|digits:16',
        ]);

        $event = Event::findOrFail($eventId);

        // ✅ CEK EMAIL SUDAH ADA DI EVENT INI BELUM
        $exists = Participant::where('email', $request->email)
            ->whereHas('registration', function ($q) use ($event) {
                $q->where('event_id', $event->id);
            })
            ->exists();

        if ($exists) {
            return back()->with('error', 'Lu udah daftar event ini bro!');
        }

        // ✅ TRANSACTION
        \DB::beginTransaction();

        try {

            // 🔥 CREATE REGISTRATION (LEADER)
            $registration = Registration::create([
                'event_id' => $event->id,
                'leader_name' => $request->nama,
                'leader_email' => $request->email,
                'total_attendees' => 1,
            ]);

            // 🔥 QR GENERATOR
            $renderer = new ImageRenderer(
                new RendererStyle(300),
                new SvgImageBackEnd()
            );

            $writer = new Writer($renderer);

            // 🔥 GENERATE QR TOKEN
            $qrToken = 'QR-' . Str::uuid();

            $qrImage = $writer->writeString($qrToken);

            $fileName = $qrToken . '.svg';
            $path = 'qrcodes/' . $fileName;

            Storage::disk('public')->put($path, $qrImage);

            // 🔥 CREATE PARTICIPANT (INI TIKET SEBENARNYA)
            $participant = Participant::create([
                'registration_id' => $registration->id,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_telp' => $request->no_telp,
                'nik' => $request->nik,
                'qr_code' => $path,
                'qr_token' => $qrToken,
                'independent_id' => null // nanti untuk gelang
            ]);

            \DB::commit();

            dispatch(function () use ($participant, $event) {
                try {
                    Mail::to($participant->email)->send(
                        new TicketMail($participant, $event)
                    );
                } catch (\Exception $e) {
                    \Log::error($e->getMessage());
                }
            });

            return redirect()
                ->route('event.success', $registration->id)
                ->with('success', 'Berhasil daftar event!');

        } catch (\Exception $e) {
            \DB::rollBack();

            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}