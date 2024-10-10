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
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
        ]);
        Hall::create($request->all());
        return redirect()->route('halls.index')->with('success', 'Hall created successfully.');
    }

    public function show($id)
    {
        $hall = Hall::findOrFail($id);
        return view('halls.show', compact('hall'));
    }

    public function edit($id)
    {
        $hall = Hall::findOrFail($id);
        return view('halls.edit', compact('hall'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'capacity' => 'required|integer',
        ]);
        $hall = Hall::findOrFail($id);
        $hall->update($request->all());
        return redirect()->route('halls.index')->with('success', 'Hall updated successfully.');
    }

    public function destroy($id)
    {
        $hall = Hall::findOrFail($id);
        $hall->delete();
        return redirect()->route('halls.index')->with('success', 'Hall deleted successfully.');
    }
}
