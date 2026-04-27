<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\ActivityLog;
use App\Models\Participant;

class ActivityController extends Controller
{
    public function scanActivity(Request $request)
    {
        $request->validate([
            'independent_id' => 'required',
            'activity_code' => 'required'
        ]);

        // 1. Cari participant dari gelang
        $participant = Participant::where('independent_id', $request->independent_id)->first();

        if (!$participant) {
            return response()->json([
                'message' => 'Gelang tidak valid'
            ], 404);
        }

        // 2. Ambil activity dari master
        $activity = Activity::where('code', $request->activity_code)->first();

        if (!$activity) {
            return response()->json([
                'message' => 'Activity tidak ditemukan'
            ], 404);
        }

        // 3. Hitung jumlah scan activity ini
        $count = ActivityLog::where('participant_id', $participant->id)
            ->where('activity_code', $activity->code)
            ->count();

        // 4. Cek limit
        if ($activity->max_scan !== null && $count >= $activity->max_scan) {
            return response()->json([
                'message' => 'Limit aktivitas tercapai'
            ], 400);
        }

        // 5. Simpan log
        $log = ActivityLog::create([
            'participant_id' => $participant->id,
            'activity_code' => $activity->code,
            'activity_name' => $activity->name,
            'scanned_at' => now()
        ]);

        return response()->json([
            'message' => 'Aktivitas berhasil dicatat',
            'data' => $log
        ]);
    }
}
