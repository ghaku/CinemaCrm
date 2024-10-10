<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Hall;
use App\Models\Showtime;
use App\Models\BookedSeat;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    public function index()
    {
        $seats = Seat::all();
        return view('seats.index', compact('seats'));
    }

    public function create()
    {
        $halls = Hall::all(); // Fetch all halls
        return view('seats.create', compact('halls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'seatNumber' => 'required|integer',
            'type' => 'required|in:regular,VIP',
            'hall_id' => 'required|exists:halls,id',
        ]);
        Seat::create($request->all());
        return redirect()->route('seats.index')->with('success', 'Seat created successfully.');
    }

    public function show($id)
    {
        $seat = Seat::findOrFail($id);
        return view('seats.show', compact('seat'));
    }

    public function edit($id)
    {
        $seat = Seat::findOrFail($id);
        $halls = Hall::all(); // Fetch all halls for editing
        return view('seats.edit', compact('seat', 'halls'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'seatNumber' => 'required|integer',
            'type' => 'required|in:regular,VIP',
            'hall_id' => 'required|exists:halls,id',
        ]);
        $seat = Seat::findOrFail($id);
        $seat->update($request->all());
        return redirect()->route('seats.index')->with('success', 'Seat updated successfully.');
    }

    public function destroy($id)
    {
        $seat = Seat::findOrFail($id);
        $seat->delete();
        return redirect()->route('seats.index')->with('success', 'Seat deleted successfully.');
    }

    public function getAvailableSeats(Request $request)
    {
        $showtime_id = $request->query('showtime_id');

        // Get the hall for the showtime
        $showtime = Showtime::findOrFail($showtime_id);
        $hall_id = $showtime->hall_id;

        // Get all seats in the hall
        $availableSeats = Seat::where('hall_id', $hall_id)
            ->whereDoesntHave('bookedSeats', function ($query) use ($showtime_id) {
                $query->whereHas('booking', function ($query) use ($showtime_id) {
                    $query->where('showtime_id', $showtime_id);
                });
            })
            ->get();

        return response()->json($availableSeats);
    }
}
