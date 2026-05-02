<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Client;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(10);
        return view('backend.event-management.index', compact('events'));
    }

    public function create()
    {
        $clients = Client::all();

        return view('backend.event-management.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'event_type' => 'required',
            'client_id' => 'required|exists:clients,id'
        ]);

        $data = $request->all();
        $slug = Str::slug($request->title);
        $count = Event::where('slug', 'like', "$slug%")->count();

        $data['slug'] = $count ? "$slug-$count" : $slug;

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('events', 'public');
        }

        $data['created_by'] = auth()->id();

        Event::create($data);

        return redirect('/backend/event-management')->with('success', 'Event berhasil dibuat');
    }

    public function show($id)
    {
        $event = Event::with('registrations.participants')->findOrFail($id);

        $participants = $event->registrations->flatMap->participants;

        return view('backend.event-management.show', compact('event', 'participants'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('backend.event-management.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            if ($event->thumbnail) {
                Storage::disk('public')->delete($event->thumbnail);
            }

            $data['thumbnail'] = $request->file('thumbnail')->store('events', 'public');
        }

        $event->update($data);

        return redirect('/backend/event-management')->with('success', 'Event berhasil diupdate');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        if ($event->thumbnail) {
            Storage::disk('public')->delete($event->thumbnail);
        }

        $event->delete();

        return back()->with('success', 'Event berhasil dihapus');
    }
}