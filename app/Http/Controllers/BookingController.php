<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\BookedSeat;
use App\Models\Seat;
use App\Models\Client;
use App\Models\Showtime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }


    public function create()
    {
        $clients = Client::all();
        $showtimes = Showtime::all();

        return view('bookings.create', compact('clients', 'showtimes'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_id' => 'required|exists:seats,id',
        ]);

        $booking = Booking::create([
            'client_id' => $validatedData['client_id'],
            'showtime_id' => $validatedData['showtime_id'],
        ]);

        BookedSeat::create([
            'booking_id' => $booking->id,
            'seat_id' => $validatedData['seat_id'],
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }


    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('bookings.show', compact('booking'));
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $clients = Client::all();
        $showtimes = Showtime::all();
        $availableSeats = Seat::where('hall_id', $booking->showtime->hall_id)->get();
        $bookedSeat = BookedSeat::where('booking_id', $booking->id)->first();
        
        return view('bookings.edit', compact('booking', 'clients', 'showtimes', 'availableSeats', 'bookedSeat'));
    }
    

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'showtime_id' => 'required|exists:showtimes,id',
            'seat_id' => 'required|exists:seats,id',
        ]);

        $booking = Booking::findOrFail($id);
        $booking->client_id = $validatedData['client_id'];
        $booking->showtime_id = $validatedData['showtime_id'];
        $booking->save();

        $bookedSeat = BookedSeat::where('booking_id', $booking->id)->first();
        $seatBooked = BookedSeat::where('seat_id', $validatedData['seat_id'])
            ->whereHas('booking', function ($query) use ($validatedData) {
                $query->where('showtime_id', $validatedData['showtime_id']);
            })
            ->exists();

        if ($seatBooked) {
            return redirect()->back()->withErrors('This seat is already booked for the selected showtime.');
        }

        $bookedSeat->seat_id = $validatedData['seat_id'];
        $bookedSeat->save();

        return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->bookedSeats()->delete();
        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
    }


    public function getAvailableSeats($id)
    {
        $showtime = Showtime::find($id);
        if (!$showtime) {
            return response()->json(['message' => 'Showtime not found'], 404);
        }
    
        $bookedSeatIds = BookedSeat::whereHas('booking', function ($query) use ($id) {
            $query->where('showtime_id', $id);
        })->pluck('seat_id')->toArray();
    
        $availableSeats = Seat::where('hall_id', $showtime->hall_id)
            ->whereNotIn('id', $bookedSeatIds)
            ->get();
    
        return response()->json($availableSeats);
    }
    
    
}
