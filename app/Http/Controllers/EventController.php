<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        return view('frontend.event.index');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('frontend.event.detail', compact('event'));
    }
}
