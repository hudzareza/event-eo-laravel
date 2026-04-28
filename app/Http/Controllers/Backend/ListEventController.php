<?php

namespace App\Http\Controllers\Backend;

use App\Exports\ParticipantsExport;
use Maatwebsite\Excel\Facades\Excel;

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
        $event = Event::findOrFail($id);
        $participants = Participant::whereHas('registration', function ($q) use ($id) {
            $q->where('event_id', $id);
        })->get();

        return view('backend.event.show', compact('participants', 'event'));
    }

    public function export($id)
    {
        $event = Event::findOrFail($id);
        $fileName = 'peserta-' . str_replace(' ', '-', strtolower($event->title)) . '.xlsx';

        return Excel::download(new ParticipantsExport($id), $fileName);
    }
}