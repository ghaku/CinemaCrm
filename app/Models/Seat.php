<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = ['seatNumber', 'type', 'hall_id'];

    public function hall()
    {
        return $this->belongsTo(Hall::class);
    }

    public function bookedSeats()
    {
        return $this->hasMany(BookedSeat::class);
    }
    
}
