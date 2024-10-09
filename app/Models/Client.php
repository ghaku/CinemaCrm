<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = ['name', 'surname', 'middlename', 'birthdate'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}

