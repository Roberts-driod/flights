<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model {
    protected $fillable = [
        'airplane_id', 'flight_date', 'return_date', 'from', 'to', 'price'
    ];

    public function airplane() {
        return $this->belongsTo(Airplane::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}