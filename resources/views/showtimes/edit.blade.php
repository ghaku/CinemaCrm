@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Showtime</h1>
    <form action="{{ route('showtimes.update', $showtime->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="movie_id">Movie</label>
            <select name="movie_id" class="form-control" required>
                @foreach ($movies as $movie)
                    <option value="{{ $movie->id }}" {{ $movie->id == $showtime->movie_id ? 'selected' : '' }}>
                        {{ $movie->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="hall_id">Hall</label>
            <select name="hall_id" class="form-control" required>
                @foreach ($halls as $hall)
                    <option value="{{ $hall->id }}" {{ $hall->id == $showtime->hall_id ? 'selected' : '' }}>
                        {{ $hall->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="date">Start Time</label>
            <input type="datetime-local" name="date" class="form-control" value="{{ $showtime->date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Showtime</button>
    </form>
</div>
@endsection
