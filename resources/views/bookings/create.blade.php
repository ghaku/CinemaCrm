@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Booking</h1>

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="client_id">Client</label>
            <select name="client_id" id="client_id" class="form-control">
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }} {{ $client->surname }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="showtime_id">Showtime</label>
            <select name="showtime_id" id="showtime_id" class="form-control">
                <option value="">Select Showtime</option>
                @foreach ($showtimes as $showtime)
                    <option value="{{ $showtime->id }}">{{ $showtime->movie->title }} - {{ $showtime->start_time }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="seat_id">Seat</label>
            <select name="seat_id" id="seat_id" class="form-control">
                <option value="">Select Seat</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Booking</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#showtime_id').change(function() {
            var showtimeId = $(this).val();

            if (showtimeId) {
                $.ajax({
                    url: '/showtimes/' + showtimeId + '/available-seats',
                    type: 'GET',
                    success: function(data) {
                        $('#seat_id').empty(); 
                        $('#seat_id').append('<option value="">Select Seat</option>'); 
                        $.each(data, function(index, seat) {
                            $('#seat_id').append('<option value="' + seat.id + '">' + seat.number + '</option>');
                        });
                    },
                    error: function() {
                        console.log('Error fetching seats.');
                    }
                });
            } else {
                $('#seat_id').empty();
                $('#seat_id').append('<option value="">Select Seat</option>'); 
            }
        });
    });
</script>
@endsection
