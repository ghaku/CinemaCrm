@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Booking Details</h1>
    <p><strong>Client:</strong> {{ $booking->client->name }} {{ $booking->client->surname }}</p>
    <p><strong>Showtime:</strong> {{ $booking->showtime->movie->title }} at {{ $booking->showtime->startTime }}</p>
    <p><strong>Seats:</strong> {{ $booking->seats }}</p>
    <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Back to Bookings</a>
</div>
@endsection
