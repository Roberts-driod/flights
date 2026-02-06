<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Flight;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $flight = Flight::findOrFail($request->flight_id);

        $booking = new Booking();
        $booking->flight_id = $flight->flight_id;
        $booking->passenger_count = $request->passenger_count;
        $booking->total_price = $flight->price * $request->passenger_count;
        $booking->booking_date = now();
        $booking->save();

        return redirect()->back()->with('success', 'Booking successful!');
    }
}