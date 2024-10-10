<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\HallController;
use App\Http\Controllers\ShowtimeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\SeatController;
use App\Http\Controllers\BookedSeatController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clients', ClientController::class);
Route::resource('movies', FilmController::class);
Route::resource('halls', HallController::class);
Route::resource('showtimes', ShowtimeController::class);
Route::resource('bookings', BookingController::class);
Route::resource('seats', SeatController::class);
Route::resource('booked_seats', BookedSeatController::class);

// Available seats under showtimes
Route::get('showtimes/{id}/available-seats', [BookingController::class, 'getAvailableSeats']);
