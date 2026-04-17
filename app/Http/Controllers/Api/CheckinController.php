<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Registration;

class CheckinController extends Controller
{
    public function scan(Request $request)
    {
        $request->validate([
            'qr_code' => 'required'
        ]);

        $registration = Registration::where('qr_code', $request->qr_code)->first();

        if (!$registration) {
            return response()->json([
                'message' => 'QR Code tidak valid'
            ], 404);
        }

        if ($registration->checkin_status) {
            return response()->json([
                'message' => 'Sudah check-in sebelumnya',
                'data' => $registration
            ], 400);
        }

        $registration->update([
            'checkin_status' => true,
            'checkin_at' => now()
        ]);

        return response()->json([
            'message' => 'Check-in berhasil',
            'data' => $registration
        ]);
    }
}
