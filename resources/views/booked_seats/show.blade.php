@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Booked Seat Details</h1>

    <ul class="list-group">
        <li class="list-group-item"><strong>Seat Number:</strong> {{ $bookedSeat->seat->seatNumber }}</li>
        <li class="list-group-item"><strong>Type:</strong> {{ ucfirst($bookedSeat->seat->type) }}</li>
        <li class="list-group-item"><strong>Hall:</strong> {{ $bookedSeat->seat->hall->name }}</li>
        <li class="list-group-item"><strong>Booking ID:</strong> {{ $bookedSeat->booking_id }}</li>
    </ul>

    <a href="{{ route('booked_seats.index') }}" class="btn btn-secondary mt-3">Back to Booked Seats</a>
    <a href="{{ route('booked_seats.edit', $bookedSeat->id) }}" class="btn btn-warning mt-3">Edit Booked Seat</a>
    <form action="{{ route('booked_seats.destroy', $bookedSeat->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger mt-3">Delete Booked Seat</button>
    </form>
</div>
@endsection
