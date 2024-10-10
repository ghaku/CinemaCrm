@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Hall</h1>
    <form action="{{ route('halls.update', $hall->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $hall->name }}" required>
        </div>
        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" name="capacity" class="form-control" value="{{ $hall->capacity }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Hall</button>
    </form>
</div>
@endsection
