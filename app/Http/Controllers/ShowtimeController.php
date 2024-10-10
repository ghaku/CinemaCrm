<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
use App\Models\Seat;

use App\Models\Movie;
use App\Models\Hall;
use Illuminate\Http\Request;

class ShowtimeController extends Controller
{
    public function index()
    {
        $showtimes = Showtime::all();
        return view('showtimes.index', compact('showtimes'));
    }

    public function create()
    {
        $movies = Movie::all();
        $halls = Hall::all();
        return view('showtimes.create', compact('movies', 'halls'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'movie_id' => 'required|exists:movies,id',
            'hall_id' => 'required|exists:halls,id',
        ]);
        Showtime::create($request->all());
        return redirect()->route('showtimes.index')->with('success', 'Showtime created successfully.');
    }


    public function show($id)
    {
        $showtime = Showtime::findOrFail($id);
        return view('showtimes.show', compact('showtime'));
    }

    public function edit($id)
    {
        $showtime = Showtime::findOrFail($id);
        $movies = Movie::all();
        $halls = Hall::all();
        return view('showtimes.edit', compact('showtime', 'movies', 'halls'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
            'movie_id' => 'required|exists:movies,id',
            'hall_id' => 'required|exists:halls,id',
        ]);
        $showtime = Showtime::findOrFail($id);
        $showtime->update($request->all());
        return redirect()->route('showtimes.index')->with('success', 'Showtime updated successfully.');
    }

    public function destroy($id)
    {
        $showtime = Showtime::findOrFail($id);
        $showtime->delete();
        return redirect()->route('showtimes.index')->with('success', 'Showtime deleted successfully.');
    }

    public function getAvailableSeats($showtimeId)
    {
        $showtime = Showtime::findOrFail($showtimeId);
        $hallId = $showtime->hall_id;

        // Assuming seats are stored in a `seats` table
        $availableSeats = Seat::where('hall_id', $hallId)
            ->whereNotIn('id', function ($query) use ($showtimeId) {
                $query->select('seat_id')
                    ->from('booked_seats')
                    ->where('showtime_id', $showtimeId);
            })
            ->get();

        return response()->json($availableSeats);
    }

}
