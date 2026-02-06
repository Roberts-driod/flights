<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model {

protected $primaryKey = 'flight_id';

    protected $fillable = [
        'airplane_id', 'flight_date', 'return_date', 'origin', 'destination', 'price'
    ];

    public function airplane() {
        return $this->belongsTo(Airplane::class);
    }

    public function bookings() {
        return $this->hasMany(Booking::class);
    }
}