<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = ['client_id', 'showtime_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function showtime()
    {
        return $this->belongsTo(Showtime::class);
    }

    public function bookedSeats()
    {
        return $this->hasMany(BookedSeat::class);
    }
}
