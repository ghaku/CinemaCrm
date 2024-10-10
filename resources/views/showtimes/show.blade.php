@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Showtime Details</h1>
    <p><strong>Movie:</strong> {{ $showtime->movie->title }}</p>
    <p><strong>Hall:</strong> {{ $showtime->hall->name }}</p>
    <p><strong>Start Time:</strong> {{ $showtime->startTime }}</p>
    <a href="{{ route('showtimes.index') }}" class="btn btn-secondary">Back to Showtimes</a>
</div>
@endsection
