<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->get();
        return view('admin.pages.events.index', compact('events'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.events.create');
    }

    /** 
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'description' => 'required|string',
            'banner' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);
        //dd("Hello");
        $bannerPath = $request->file('banner')->store('events', 'public');

        Event::create([
            'title' => $request->title,
            'event_date' => $request->event_date,
            'description' => $request->description,
            'banner' => $bannerPath,
        ]);

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id); // fetch event by ID
        return view('admin.pages.events.show', compact('event')); // pass to view
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.pages.events.edit', compact('event'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'event_date' => 'required|date',
            'description' => 'required|string',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // 🔧 Fetch the event manually
        $event = Event::findOrFail($id);

        // 🖼️ Handle image update
        if ($request->hasFile('banner')) {
            $path = $request->file('banner')->store('events', 'public');
            $validated['banner'] = $path;
        }

        // 📝 Update the event
        $event->update($validated);

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Delete banner image if it exists
        if ($event->banner && \Storage::disk('public')->exists($event->banner)) {
            \Storage::disk('public')->delete($event->banner);
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }

}
