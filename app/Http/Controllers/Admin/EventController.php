<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // 📌 List all events
    public function index()
    {
        $events = Event::withCount('images')->latest()->get();
        return view('admin.pages.events.index', compact('events'));
    }

    // 📌 Show create form
    public function create()
    {
        return view('admin.pages.events.create');
    }

    // 📌 Store event
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date'  => 'required|date',
            'location'    => 'nullable|string',
            'status'      => 'required|in:past,upcoming',
            'images.*'    => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $event = Event::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $filename = uniqid('img_') . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('assets/uploads/events'), $filename);
                $event->images()->create([
                    'image_path' => 'assets/uploads/events/' . $filename
                ]);
            }
        }

        return redirect()->route('admin.events.index')->with('success', 'Event created successfully.');
    }

    // 📌 Show event details
    public function show(Event $event)
    {
        $event->load('images');
        return view('admin.pages.events.show', compact('event'));
    }

    // 📌 Edit form
    public function edit(Event $event)
    {
        $event->load('images');
        return view('admin.pages.events.edit', compact('event'));
    }

    // 📌 Update event
    public function update(Request $request, $id)
    {
        //dd('Update method called');
        $event = Event::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'location' => 'nullable|string|max:255',
            'status' => 'required|in:past,upcoming',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
        ]);

        $event->update([
            'title'       => $validated['title'],
            'description' => $validated['description'] ?? null,
            'event_date'  => $validated['event_date'],
            'location'    => $validated['location'] ?? null,
            'status'      => $validated['status'],
        ]);

        // Count current images
        $existingCount = $event->images()->count();

        // Add new images if provided
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                if ($existingCount >= 20) break;

                $path = $file->store('events/images', 'public');

                EventImage::create([
                    'event_id'   => $event->id,
                    'image_path' => 'storage/' . $path,
                ]);

                $existingCount++;
            }
        }

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully.');
    }

    public function deleteImage($id)
    {
        $image = EventImage::findOrFail($id);

        if (file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }

        $image->delete();

        return back()->with('success', 'Image deleted successfully.');
    }




    // 📌 Delete event
    public function destroy(Event $event)
    {
        //dd('Delete method called');

        // Delete images from storage
        foreach ($event->images as $image) {
            $path = public_path($image->image_path);
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully.');
    }

    

}
