@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Bookings</h1>
    <a href="{{ route('bookings.create') }}" class="btn btn-primary">Add Booking</a>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Client</th>
                <th>Showtime</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->client->name }} {{ $booking->client->surname }}</td>
                    <td>{{ $booking->showtime->movie->title }} at {{ $booking->showtime->startTime }}</td>
                    <td>
                        <a href="{{ route('bookings.show', $booking->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
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
