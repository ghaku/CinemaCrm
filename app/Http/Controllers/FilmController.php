<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre' => 'required|in:comedy,fantasy,horror,action,melodrama,mystic,detective',
            'minAge' => 'required|integer',
            'duration' => 'required',
            'releaseDate' => 'required|date',
            'director' => 'required',
        ]);
        Movie::create($request->all());
        return redirect()->route('movies.index')->with('success', 'Movie created successfully.');
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.edit', compact('movie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'genre' => 'required|in:comedy,fantasy,horror,action,melodrama,mystic,detective',
            'minAge' => 'required|integer',
            'duration' => 'required',
            'releaseDate' => 'required|date',
            'director' => 'required',
        ]);
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        return redirect()->route('movies.index')->with('success', 'Movie updated successfully.');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully.');
    }
}
