@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Movie</h1>
    <form action="{{ route('movies.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="genre">Genre</label>
            <select name="genre" class="form-control" required>
                <option value="comedy">Comedy</option>
                <option value="fantasy">Fantasy</option>
                <option value="horror">Horror</option>
                <option value="action">Action</option>
                <option value="melodrama">Melodrama</option>
                <option value="mystic">Mystic</option>
                <option value="detective">Detective</option>
            </select>
        </div>
        <div class="form-group">
            <label for="minAge">Minimum Age</label>
            <input type="number" name="minAge" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="duration">Duration</label>
            <input type="text" name="duration" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="releaseDate">Release Date</label>
            <input type="date" name="releaseDate" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="director">Director</label>
            <input type="text" name="director" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Movie</button>
    </form>
</div>
@endsection
