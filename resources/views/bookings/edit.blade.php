@extends('layouts.app')

@section('content')
    <h1>Edit Booking</h1>

    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="client">Select Client:</label>
        <select name="client_id" id="client">
            @foreach($clients as $client)
                <option value="{{ $client->id }}" {{ $client->id == $booking->client_id ? 'selected' : '' }}>
                    {{ $client->name }}
                </option>
            @endforeach
        </select>

        <label for="showtime">Select Showtime:</label>
        <select name="showtime_id" id="showtime">
            @foreach($showtimes as $showtime)
                <option value="{{ $showtime->id }}" {{ $showtime->id == $booking->showtime_id ? 'selected' : '' }}>
                    {{ $showtime->movie->title }} - {{ $showtime->date }}
                </option>
            @endforeach
        </select>

        <label for="seat">Select Seat:</label>
        <select name="seat_id" id="seat">
            @foreach($availableSeats as $seat)
                <option value="{{ $seat->id }}" {{ isset($bookedSeat) && $seat->id == $bookedSeat->seat_id ? 'selected' : '' }}>
                    Seat {{ $seat->seatNumber }} - {{ $seat->type }}
                </option>
            @endforeach
        </select>

        <button type="submit">Update Booking</button>
    </form>

    <script>
        document.getElementById('showtime').addEventListener('change', function() {
            var showtimeId = this.value;

            // AJAX request to get available seats for the selected showtime
            fetch(`/showtimes/${showtimeId}/available-seats`)
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
