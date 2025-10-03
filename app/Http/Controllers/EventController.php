<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    // List events (Blade)
    public function index()
    {
        $events = Event::all();
        return view('admin.events.index', compact('events'));
    }

    // Create form
    public function create()
    {
        return view('admin.events.create');
    }

    // Store new event (API + Blade)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_name'  => 'required|string|max:255',
            'event_type'  => 'required|string|max:255',
            'venue'       => 'required|string|max:255',
            'date'        => 'nullable|date',
            'description' => 'nullable|string',
            'images.*'    => 'nullable|image|max:2048',
        ]);

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $imagePaths[] = $img->store('events', 'public');
            }
        }
        $validated['images'] = $imagePaths;

        $event = Event::create($validated);

        // API request returns JSON
        if ($request->expectsJson()) {
            return response()->json(['message' => 'Event created successfully', 'event' => $event]);
        }

        // Blade redirect
        return redirect()->route('admin.events.index')->with('success', 'Event created successfully!');
    }

    // Edit form
    public function edit($id)
    {
        $event = Event::find($id);
        if (!$event) return redirect()->route('admin.events.index')->with('error', 'Event not found');

        return view('admin.events.edit', compact('event'));
    }

    // Update event (API + Blade)
    public function update(Request $request, $id)
    {
        $event = Event::find($id);
        if (!$event) {
            if ($request->expectsJson()) {
                return response()->json(['message' => 'Event not found'], 404);
            }
            return redirect()->route('admin.events.index')->with('error', 'Event not found');
        }

        $validated = $request->validate([
            'event_name'  => 'required|string|max:255',
            'event_type'  => 'required|string|max:255',
            'venue'       => 'required|string|max:255',
            'date'        => 'nullable|date',
            'description' => 'nullable|string',
            'images.*'    => 'nullable|image|max:2048',
        ]);

        $event->update($request->only(['event_name','event_type','venue','date','description']));

        if ($request->hasFile('images')) {
            // delete old images
            foreach ($event->images ?? [] as $img) {
                Storage::disk('public')->delete($img);
            }

            $images = [];
            foreach($request->file('images') as $img) {
                $images[] = $img->store('events','public');
            }
            $event->images = $images;
            $event->save();
        }

        if ($request->expectsJson()) {
            return response()->json(['message' => 'Event updated successfully', 'event' => $event]);
        }

        return redirect()->route('admin.events.index')->with('success', 'Event updated successfully!');
    }

    // Delete event
    public function destroy($id)
    {
        $event = Event::find($id);
        if (!$event) return response()->json(['message' => 'Event not found'], 404);

        foreach ($event->images ?? [] as $img) {
            Storage::disk('public')->delete($img);
        }

        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }

    // app/Http/Controllers/EventController.php

public function customerEvents(Request $request)
{
    // Get all events, ordered by date descending
    $events = Event::orderBy('date', 'desc')->get();

    // If the request expects JSON (like Postman)
    if ($request->wantsJson() || $request->is('api/*')) {
        return response()->json([
            'success' => true,
            'events' => $events
        ]);
    }

    // Otherwise, return web view
    return view('customer.events', compact('events'));
}


}
