@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Booked Seats</h1>
    <a href="{{ route('booked_seats.create') }}" class="btn btn-primary mb-3">Add Booked Seat</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Seat Number</th>
                <th>Type</th>
                <th>Hall</th>
                <th>Booking ID</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookedSeats as $bookedSeat)
                <tr>
                    <td>{{ $bookedSeat->seat->seatNumber }}</td>
                    <td>{{ ucfirst($bookedSeat->seat->type) }}</td>
                    <td>{{ $bookedSeat->seat->hall->name }}</td> 
                    <td>{{ $bookedSeat->booking_id }}</td>
                    <td>
                        <a href="{{ route('booked_seats.show', $bookedSeat->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('booked_seats.edit', $bookedSeat->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('booked_seats.destroy', $bookedSeat->id) }}" method="POST" style="display:inline;">
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
