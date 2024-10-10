@extends('layouts.app') <!-- Adjust based on your layout -->

@section('content')
<div class="container">
    <h1>Add Booked Seat</h1>
    <form action="{{ route('booked_seats.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="seat_id" class="form-label">Seat</label>
            <select name="seat_id" class="form-select" required>
                @foreach ($seats as $seat)
                    <option value="{{ $seat->id }}">{{ $seat->seatNumber }} ({{ ucfirst($seat->type) }})</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="booking_id" class="form-label">Booking ID</label>
            <input type="text" name="booking_id" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Booked Seat</button>
        <a href="{{ route('booked_seats.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
