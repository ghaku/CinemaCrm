<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use Illuminate\Http\Request;

class HallController extends Controller
{
    public function index()
    {
        $halls = Hall::all();
        return view('halls.index', compact('halls'));
    }

    public function create()
    {
        return view('halls.create');
    }

    public function store(Request $request)
    {
        Hall::create($request->all());
        return redirect()->route('halls.index');
    }

    public function show(Hall $hall)
    {
        return view('halls.show', compact('hall'));
    }

    public function edit(Hall $hall)
    {
        return view('halls.edit', compact('hall'));
    }

    public function update(Request $request, Hall $hall)
    {
        $hall->update($request->all());
        return redirect()->route('halls.index');
    }

    public function destroy(Hall $hall)
    {
        $hall->delete();
        return redirect()->route('halls.index');
    }
}
