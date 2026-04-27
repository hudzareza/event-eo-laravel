<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Participant;

class ListEventController extends Controller
{
    public function index()
    {
        $event = Event::get();
        return view('backend.event.index', compact('event'));
    }


    public function show($id)
    {
        $participants = Participant::whereHas('registration', function ($q) use ($id) {
            $q->where('event_id', $id);
        })->get();

        return view('backend.event.show', compact('participants'));
    }
}