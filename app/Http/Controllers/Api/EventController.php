<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Models\Registration;

class EventController extends Controller
{
    public function index()
    {
        return Event::where('is_public', true)
            ->where('status','published')
            ->get();
    }

    public function register($id)
    {
        $event = Event::findOrFail($id);
        $user = auth()->user();

        $exists = Registration::where('event_id',$id)
            ->where('user_id',$user->id)
            ->exists();

        if ($exists) {
            return response()->json(['message'=>'Already registered']);
        }

        $registration = Registration::create([
            'event_id' => $id,
            'user_id' => $user->id,
            'qr_code' => 'QR-'.Str::uuid()
        ]);

        return response()->json($registration);
    }
}
