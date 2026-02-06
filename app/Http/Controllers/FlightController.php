<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index() {
        return view('flights.index', ['flights' => null]);
    }

    public function search(Request $request) {
        $from = $request->input('from');
        $to = $request->input('to');
        $date = $request->input('departure');
        $passengers = $request->input('passengers', 1);

        // Meklējam lidojumus DB
        $flights = Flight::where('from', 'LIKE', "%$from%")
            ->where('to', 'LIKE', "%$to%")
            ->whereDate('flight_date', $date)
            ->with('airplane.airline') // Ielādējam saistītos datus (Eager Loading)
            ->get();

        return view('flights.index', compact('flights', 'passengers'));
    }
}