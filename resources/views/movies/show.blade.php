@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Movie Details</h1>
    <p><strong>Title:</strong> {{ $movie->title }}</p>
    <p><strong>Description:</strong> {{ $movie->description }}</p>
    <p><strong>Genre:</strong> {{ $movie->genre }}</p>
    <p><strong>Min Age:</strong> {{ $movie->minAge }}</p>
    <p><strong>Duration:</strong> {{ $movie->duration }}</p>
    <p><strong>Release Date:</strong> {{ $movie->releaseDate }}</p>
    <p><strong>Director:</strong> {{ $movie->director }}</p>
    <a href="{{ route('movies.index') }}" class="btn btn-secondary">Back to Movies</a>
</div>
@endsection
