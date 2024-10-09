<?php

namespace App\Http\Controllers;

use App\Models\Seat;
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
        return view('seats.create');
    }

    public function store(Request $request)
    {
        Seat::create($request->all());
        return redirect()->route('seats.index');
    }

    public function show(Seat $seat)
    {
        return view('seats.show', compact('seat'));
    }

    public function edit(Seat $seat)
    {
        return view('seats.edit', compact('seat'));
    }

    public function update(Request $request, Seat $seat)
    {
        $seat->update($request->all());
        return redirect()->route('seats.index');
    }

    public function destroy(Seat $seat)
    {
        $seat->delete();
        return redirect()->route('seats.index');
    }
}
