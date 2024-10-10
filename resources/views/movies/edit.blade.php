@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Movie</h1>
    <form action="{{ route('movies.update', $movie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $movie->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required>{{ $movie->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <select name="genre" class="form-control" required>
                <option value="comedy" {{ $movie->genre == 'comedy' ? 'selected' : '' }}>Comedy</option>
                <option value="fantasy" {{ $movie->genre == 'fantasy' ? 'selected' : '' }}>Fantasy</option>
                <option value="horror" {{ $movie->genre == 'horror' ? 'selected' : '' }}>Horror</option>
                <option value="action" {{ $movie->genre == 'action' ? 'selected' : '' }}>Action</option>
                <option value="melodrama" {{ $movie->genre == 'melodrama' ? 'selected' : '' }}>Melodrama</option>
                <option value="mystic" {{ $movie->genre == 'mystic' ? 'selected' : '' }}>Mystic</option>
                <option value="detective" {{ $movie->genre == 'detective' ? 'selected' : '' }}>Detective</option>
            </select>
        </div>
        <div class="form-group">
            <label for="minAge">Minimum Age</label>
            <input type="number" name="minAge" class="form-control" value="{{ $movie->minAge }}" required>
        </div>
        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" name="duration" class="form-control" value="{{ $movie->duration }}" required>
        </div>
        <div class="form-group">
            <label for="releaseDate">Release Date</label>
            <input type="date" name="releaseDate" class="form-control" value="{{ $movie->releaseDate }}" required>
        </div>
        <div class="form-group">
            <label for="director">Director</label>
            <input type="text" name="director" class="form-control" value="{{ $movie->director }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Movie</button>
    </form>
</div>
@endsection
