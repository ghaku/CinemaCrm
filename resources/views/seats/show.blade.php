@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Seat Details</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Seat Number:</strong> {{ $seat->seatNumber }}</li>
        <li class="list-group-item"><strong>Type:</strong> {{ ucfirst($seat->type) }}</li>
        <li class="list-group-item"><strong>Hall:</strong> {{ $seat->hall->name }}</li>
    </ul>

    <a href="{{ route('seats.index') }}" class="btn btn-secondary mt-3">Back to Seats</a>
    <a href="{{ route('seats.edit', $seat->id) }}" class="btn btn-warning mt-3">Edit Seat</a>
    <form action="{{ route('seats.destroy', $seat->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">Delete Seat</button>
    </form>
</div>
@endsection
