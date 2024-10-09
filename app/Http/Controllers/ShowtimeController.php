<?php

namespace App\Http\Controllers;

use App\Models\Showtime;
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
        return view('showtimes.create');
    }

    public function store(Request $request)
    {
        Showtime::create($request->all());
        return redirect()->route('showtimes.index');
    }

    public function show(Showtime $showtime)
    {
        return view('showtimes.show', compact('showtime'));
    }

    public function edit(Showtime $showtime)
    {
        return view('showtimes.edit', compact('showtime'));
    }

    public function update(Request $request, Showtime $showtime)
    {
        $showtime->update($request->all());
        return redirect()->route('showtimes.index');
    }

    public function destroy(Showtime $showtime)
    {
        $showtime->delete();
        return redirect()->route('showtimes.index');
    }
}
