<?php

namespace App\Http\Controllers;

use App\Models\BookedSeat; 
use App\Models\Client;
use App\Models\Booking;
use App\Models\Showtime;
use App\Models\Seat; 
use Illuminate\Http\Request;

class BookedSeatController extends Controller
{
    public function index()
    {
        $bookedSeats = BookedSeat::all();
        return view('booked_seats.index', compact('bookedSeats'));
    }

    public function create()
    {
        $seats = Seat::all(); 
        return view('booked_seats.create', compact('seats')); // Pass seats to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'seat_id' => 'required|exists:seats,id',
        ]);
        BookedSeat::create($request->all());
        return redirect()->route('booked_seats.index')->with('success', 'Booked seat created successfully.');
    }

    public function show($id)
    {
        $bookedSeat = BookedSeat::findOrFail($id);
        return view('booked_seats.show', compact('bookedSeat'));
    }

    public function edit($id)
    {
        $bookedSeat = BookedSeat::findOrFail($id);
        $clients = Client::all();
        $showtimes = Showtime::all();
        $availableSeats = Seat::where('hall_id', $bookedSeat->booking->showtime->hall_id)->get(); // Make sure this is correct
    
        // Retrieve all bookings for the dropdown
        $bookings = Booking::all();
    
        return view('booked_seats.edit', compact('bookedSeat', 'clients', 'showtimes', 'availableSeats', 'bookings'));
    }
    

    public function update(Request $request, $id)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'seat_id' => 'required|exists:seats,id',
        ]);
        $bookedSeat = BookedSeat::findOrFail($id);
        $bookedSeat->update($request->all());
        return redirect()->route('booked_seats.index')->with('success', 'Booked seat updated successfully.');
    }

    public function destroy($id)
    {
        $bookedSeat = BookedSeat::findOrFail($id);
        $bookedSeat->delete();
        return redirect()->route('booked_seats.index')->with('success', 'Booked seat deleted successfully.');
    }
}
