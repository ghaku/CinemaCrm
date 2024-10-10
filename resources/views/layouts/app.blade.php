<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Cinema</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <nav>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/clients') }}">Clients</a></li>
            <li><a href="{{ url('/movies') }}">Movies</a></li>
            <li><a href="{{ url('/halls') }}">Halls</a></li>
            <li><a href="{{ url('/showtimes') }}">Showtimes</a></li>
            <li><a href="{{ url('/bookings') }}">Bookings</a></li>
            <li><a href="{{ url('/seats') }}">Seats</a></li>
            <li><a href="{{ url('/booked_seats') }}">Booked Seats</a></li>

        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>

</html>