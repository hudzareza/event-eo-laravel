<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Registration;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use App\Models\Participant;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;


class EventController extends Controller
{
    public function index()
    {
        return Event::where('is_public', true)
            ->where('status','published')
            ->get();
    }

    public function register(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'leader_name' => 'required|string',
            'leader_email' => 'required|email',
            'participants' => 'required|array|min:1|max:5',
            'participants.*.name' => 'required|string',
            'participants.*.email' => 'required|email|distinct',
            'participants.*.phone' => 'nullable|string',
        ]);

        $totalRequested = count($request->participants);

        $registered = Participant::whereHas('registration', function ($q) use ($event) {
            $q->where('event_id', $event->id);
        })->count();

        $quota = $event->quota;

        if ($quota !== null && ($registered + $totalRequested > $quota)) {
            return response()->json([
                'message' => 'Kuota penuh'
            ], 422);
        }

        $emails = collect($request->participants)->pluck('email');

        $existsEmail = Participant::whereIn('email', $emails)
            ->whereHas('registration', function ($q) use ($event) {
                $q->where('event_id', $event->id);
            })
            ->exists();

        if ($existsEmail) {
            return response()->json([
                'message' => 'Ada peserta yang sudah terdaftar di event ini'
            ], 422);
        }

        $registration = null;

        \DB::transaction(function () use ($request, $event, &$registration) {

            $registration = Registration::create([
                'event_id' => $event->id,
                'leader_name' => $request->leader_name,
                'leader_email' => $request->leader_email,
                'total_attendees' => count($request->participants),
            ]);

            $renderer = new ImageRenderer(
                new RendererStyle(300),
                new SvgImageBackEnd()
            );

            $writer = new Writer($renderer);

            foreach ($request->participants as $p) {

                $qrToken = 'QR-' . Str::uuid();

                $qrImage = $writer->writeString($qrToken);

                $fileName = $qrToken . '.svg';
                $path = 'qrcodes/' . $fileName;

                Storage::disk('public')->put($path, $qrImage);

                Participant::create([
                    'registration_id' => $registration->id,
                    'nama' => $p['name'], // ✅ FIX
                    'email' => $p['email'],
                    'no_telp' => $p['phone'] ?? null,
                    'qr_code' => $path,
                    'qr_token' => $qrToken,
                ]);
            }
        });

        $registration->load('participants');

        return response()->json([
            'message' => 'Berhasil daftar event',
            'data' => [
                'registration_id' => $registration->id,
                'participants' => $registration->participants->map(function ($p) {
                    return [
                        'nama' => $p->nama,
                        'email' => $p->email,
                        'qr_url' => asset('storage/' . $p->qr_code)
                    ];
                })
            ]
        ]);
    }

    public function store(Request $request)
    {
        if (!auth()->user()->isAdmin() && !auth()->user()->isStaff()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'title' => 'required|string',
            'event_type' => 'required|in:umum,freemium,private,plus',
            'registration_type' => 'required|in:single,group',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $event = Event::create([
            'client_id' => $request->client_id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'event_type' => $request->event_type,
            'registration_type' => $request->registration_type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'quota' => $request->quota,
            'is_public' => $request->is_public ?? true,
            'is_paid' => $request->is_paid ?? false,
            'price' => $request->price,
            'status' => 'draft',
            'created_by' => auth()->id(),
        ]);

        return response()->json([
            'message' => 'Event berhasil dibuat',
            'data' => $event
        ]);
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        if (!auth()->user()->isAdmin() && !auth()->user()->isStaff()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $event->update($request->only([
            'title',
            'description',
            'location',
            'event_type',
            'registration_type',
            'start_date',
            'end_date',
            'quota',
            'is_public',
            'is_paid',
            'price',
            'status'
        ]));

        return response()->json([
            'message' => 'Event berhasil diupdate',
            'data' => $event
        ]);
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if (!auth()->user()->isAdmin()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        $event->delete();

        return response()->json([
            'message' => 'Event berhasil dihapus'
        ]);
    }
}
