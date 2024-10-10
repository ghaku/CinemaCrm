@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Showtimes</h1>
    <a href="{{ route('showtimes.create') }}" class="btn btn-primary">Add Showtime</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Movie</th>
                <th>Hall</th>
                <th>Start Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($showtimes as $showtime)
                <tr>
                    <td>{{ $showtime->movie->title }}</td>
                    <td>{{ $showtime->hall->name }}</td>
                    <td>{{ $showtime->startTime }}</td>
                    <td>
                        <a href="{{ route('showtimes.show', $showtime->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('showtimes.edit', $showtime->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('showtimes.destroy', $showtime->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
