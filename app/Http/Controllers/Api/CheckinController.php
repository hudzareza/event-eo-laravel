<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;
use App\Models\Participant;

class CheckinController extends Controller
{
    public function scanQr(Request $request)
    {
        $request->validate([
            'qr_token' => 'required'
        ]);

        $participant = Participant::where('qr_token', $request->qr_token)->first();

        if (!$participant) {
            return response()->json([
                'message' => 'QR tidak valid'
            ], 404);
        }

        if ($participant->checkin_status) {
            return response()->json([
                'message' => 'Sudah check-in',
                'data' => $participant
            ], 400);
        }

        return response()->json([
            'message' => 'Peserta ditemukan',
            'data' => $participant
        ]);
    }

    public function assignWristband(Request $request)
    {
        $request->validate([
            'participant_id' => 'required|exists:participants,id',
            'independent_id' => 'required'
        ]);

        $participant = Participant::find($request->participant_id);

        $exists = Participant::where('independent_id', $request->independent_id)->exists();

        if ($exists) {
            return response()->json([
                'message' => 'Gelang sudah digunakan'
            ], 400);
        }

        $participant->update([
            'independent_id' => $request->independent_id,
            'checkin_status' => true,
            'checkin_at' => now()
        ]);

        if ($participant->checkin_status) {
            return response()->json([
                'message' => 'Peserta sudah check-in'
            ], 400);
        }

        return response()->json([
            'message' => 'Check-in berhasil',
            'data' => $participant
        ]);
    }
}
