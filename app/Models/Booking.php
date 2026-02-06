<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model {

protected $primaryKey = 'book_id';

    protected $fillable = [
        'flight_id', 'passenger_count', 'total_price', 'booking_date'
    ];

    public function flight() {
        return $this->belongsTo(Flight::class);
    }
}