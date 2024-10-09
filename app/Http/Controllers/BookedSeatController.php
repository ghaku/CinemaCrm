<?php

namespace App\Http\Controllers;

use App\Models\BookedSeat;
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
        return view('booked_seats.create');
    }

    public function store(Request $request)
    {
        BookedSeat::create($request->all());
        return redirect()->route('booked_seats.index');
    }

    public function show(BookedSeat $bookedSeat)
    {
        return view('booked_seats.show', compact('bookedSeat'));
    }

    public function edit(BookedSeat $bookedSeat)
    {
        return view('booked_seats.edit', compact('bookedSeat'));
    }

    public function update(Request $request, BookedSeat $bookedSeat)
    {
        $bookedSeat->update($request->all());
        return redirect()->route('booked_seats.index');
    }

    public function destroy(BookedSeat $bookedSeat)
    {
        $bookedSeat->delete();
        return redirect()->route('booked_seats.index');
    }
}
