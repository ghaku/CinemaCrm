@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Movies</h1>
    <a href="{{ route('movies.create') }}" class="btn btn-primary">Add Movie</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Genre</th>
                <th>Min Age</th>
                <th>Duration</th>
                <th>Release Date</th>
                <th>Director</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td>{{ $movie->title }}</td>
                    <td>{{ $movie->description }}</td>
                    <td>{{ $movie->genre }}</td>
                    <td>{{ $movie->minAge }}</td>
                    <td>{{ $movie->duration }}</td>
                    <td>{{ $movie->releaseDate }}</td>
                    <td>{{ $movie->director }}</td>
                    <td>
                        <a href="{{ route('movies.show', $movie->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline;">
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
