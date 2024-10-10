@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Hall</h1>
    <form action="{{ route('halls.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="capacity">Capacity</label>
            <input type="number" name="capacity" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Hall</button>
    </form>
</div>
@endsection
