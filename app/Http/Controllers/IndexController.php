<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class IndexController extends Controller
{
    public function index()
    {
        $event = Event::latest()->take(3)->get();
        return view('frontend.index', compact('event'));
    }
}
