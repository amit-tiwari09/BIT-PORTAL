<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // Display a list of events
    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('events.index', compact('events'));
    }

    public function indexfront()
    {
        $events = Event::where('date', '>=', now()->toDateString())
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        return view('events.index2', compact('events'));
    }

    // Show form to create a new event
    public function create()
    {
        return view('events.create');
    }

    // Save a new event in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date|after_or_equal:today', // Ensure the date is today or in the future
            'start_time' => [
                'required',
                'date_format:H:i', // Ensures the time is in the correct format
                function ($attribute, $value, $fail) use ($request) {
                    $startDateTime = \Carbon\Carbon::parse($request->date . ' ' . $value);
                    if ($startDateTime->isPast()) {
                        $fail('The start time must be a future time.');
                    }
                },
            ],
            'end_time' => [
                'required',
                'date_format:H:i', // Ensure the end time is in the correct format
                'after:start_time', // Ensure end time is after start time
                function ($attribute, $value, $fail) use ($request) {
                    $endDateTime = \Carbon\Carbon::parse($request->date . ' ' . $value);
                    if ($endDateTime->isPast()) {
                        $fail('The end time must be a future time.');
                    }
                },
            ],
            'location' => 'required',
        ]);
        
        

        Event::create($request->all());
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    // Show a specific event
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    // Show form to edit an event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    // Update an event in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date|after_or_equal:today', // Ensure the date is today or in the future
            'start_time' => [
                'required',
                'date_format:H:i', // Ensures the time is in the correct format
                function ($attribute, $value, $fail) use ($request) {
                    $startDateTime = \Carbon\Carbon::parse($request->date . ' ' . $value);
                    if ($startDateTime->isPast()) {
                        $fail('The start time must be a future time.');
                    }
                },
            ],
            'end_time' => [
                'required',
                'date_format:H:i', // Ensure the end time is in the correct format
                'after:start_time', // Ensure end time is after start time
                function ($attribute, $value, $fail) use ($request) {
                    $endDateTime = \Carbon\Carbon::parse($request->date . ' ' . $value);
                    if ($endDateTime->isPast()) {
                        $fail('The end time must be a future time.');
                    }
                },
            ],
            'location' => 'required',
        ]);
        
        

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    // Delete an event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
