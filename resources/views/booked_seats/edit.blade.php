@extends('layouts.app')

@section('content')
    <h1>Edit Booked Seat</h1>

    <form action="{{ route('booked_seats.update', $bookedSeat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Select Booking -->
        <label for="booking">Select Booking:</label>
        <select name="booking_id" id="booking">
            @foreach($bookings as $booking)
                <option value="{{ $booking->id }}" {{ $booking->id == $bookedSeat->booking_id ? 'selected' : '' }}>
                    Booking #{{ $booking->id }} - {{ $booking->client->name }} - {{ $booking->showtime->movie->title }} ({{ $booking->showtime->date }})
                </option>
            @endforeach
        </select>

        <!-- Select Seat -->
        <label for="seat">Select Seat:</label>
        <select name="seat_id" id="seat">
            @foreach($availableSeats as $seat)
                <option value="{{ $seat->id }}" {{ $seat->id == $bookedSeat->seat_id ? 'selected' : '' }}>
                    Seat {{ $seat->seatNumber }} - {{ $seat->type }}
                </option>
            @endforeach
        </select>

        <button type="submit">Update Booked Seat</button>
    </form>

    <script>
        document.getElementById('booking').addEventListener('change', function() {
            var bookingId = this.value;

            // AJAX request to get available seats for the selected booking's showtime
            fetch(`/bookings/${bookingId}/available-seats`)
                .then(response => response.json())
                .then(data => {
                    var seatSelect = document.getElementById('seat');
                    seatSelect.innerHTML = '';

                    data.availableSeats.forEach(function(seat) {
                        var option = document.createElement('option');
                        option.value = seat.id;
                        option.text = 'Seat ' + seat.seatNumber + ' - ' + seat.type;
                        seatSelect.appendChild(option);
                    });
                });
        });
    </script>
@endsection
