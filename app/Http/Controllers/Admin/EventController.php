<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->paginate(15);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category'    => ['required', 'in:workshops,conference,webinars,forums'],
            'event_date'  => ['nullable', 'date'],
            'location'    => ['nullable', 'string', 'max:255'],
            'image'       => ['nullable', 'image', 'max:2048'],
            'status'      => ['required', 'in:draft,published'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'category'    => ['required', 'in:workshops,conference,webinars,forums'],
            'event_date'  => ['nullable', 'date'],
            'location'    => ['nullable', 'string', 'max:255'],
            'image'       => ['nullable', 'image', 'max:2048'],
            'status'      => ['required', 'in:draft,published'],
        ]);

        if ($request->hasFile('image')) {
            if ($event->image) {
                Storage::disk('public')->delete($event->image);
            }
            $data['image'] = $request->file('image')->store('events', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Event $event)
    {
        if ($event->image) {
            Storage::disk('public')->delete($event->image);
        }
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event deleted.');
    }
}
