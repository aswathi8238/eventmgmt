<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\esession;
use App\Models\event;

class Eventsession extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($event_id)
    {  $data=event::where("event_id","=",$event_id)->first();
        $ar1=['selected_contact'=>$data];
         return view('pages.session')->with($ar1);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
           
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         
        $validatedData=$request->validate([
            'title' => 'required|string|max:255',
            'speaker' => 'required|string|max:255',
            'start_time' => 'date_format:H:i',
            'end_time' => 'date_format:H:i|after:time_start',
            'event_id'=> 'required|exists:events,event_id',
        ]);
    
                    // Check for overlapping sessions
        $isBooked = esession::where('event_ref', $validatedData['event_id'])
        ->where(function ($query) use ($validatedData) {
            $query->whereBetween('start_time', [$validatedData['start_time'], $validatedData['end_time']])
                  ->orWhereBetween('end_time', [$validatedData['start_time'], $validatedData['end_time']])
                  ->orWhere(function ($query) use ($validatedData) {
                      $query->where('start_time', '<=', $validatedData['start_time'])
                            ->where('end_time', '>=', $validatedData['end_time']);
                  });
        })->exists();

    if ($isBooked) {
        return redirect()->back()->withErrors(['time_slot' => 'The selected time slot is already booked.']);
    }

    // Create the session if no overlap
    esession::create([
        'title' => $validatedData['title'],
        'speaker' => $validatedData['speaker'],
        'start_time' => $validatedData['start_time'],
        'end_time' => $validatedData['end_time'],
        'event_ref' => $validatedData['event_id'],
    ]);

    return redirect('/h')->with('success', 'Event session created successfully!');
        
    }

        /**
     * Display the specified resource.
     */
    public function show($event_id)
    {
        // Retrieve the event by its ID
        $event = event::findOrFail($event_id);

        // Retrieve all sessions related to the event
        $sessions = esession::where('event_ref', $event_id)->orderBy('start_time')->get();

        // Pass the event and sessions to the view
        return view('pages.viewsession', compact('event','sessions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
