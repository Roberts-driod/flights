<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FlightDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Ieliekam Aviokompānijas
        $airlineId = DB::table('airlines')->insertGetId([
            'name' => 'AirBaltic'
        ]);

        $airlineId2 = DB::table('airlines')->insertGetId([
            'name' => 'Lufthansa'
        ]);

        // 2. Ieliekam Lidmašīnas
        $airplaneId = DB::table('airplanes')->insertGetId([
            'airline_id' => $airlineId,
            'name' => 'Airbus A220-300'
        ]);

        $airplaneId2 = DB::table('airplanes')->insertGetId([
            'airline_id' => $airlineId2,
            'name' => 'Boeing 747'
        ]);

        // 3. Ieliekam Lidojumus (pielāgo datumus, lai tie būtu nākotnē!)
        DB::table('flights')->insert([
            [
                'airplane_id' => $airplaneId,
                'flight_date' => Carbon::now()->addDays(5)->format('Y-m-d'),
                'return_date' => Carbon::now()->addDays(10)->format('Y-m-d'),
                'from' => 'Riga',
                'to' => 'London',
                'price' => 150.00,
            ],
            [
                'airplane_id' => $airplaneId,
                'flight_date' => Carbon::now()->addDays(7)->format('Y-m-d'),
                'return_date' => Carbon::now()->addDays(14)->format('Y-m-d'),
                'from' => 'Riga',
                'to' => 'Berlin',
                'price' => 89.99,
            ],
            [
                'airplane_id' => $airplaneId2,
                'flight_date' => Carbon::now()->addDays(2)->format('Y-m-d'),
                'return_date' => Carbon::now()->addDays(5)->format('Y-m-d'),
                'from' => 'Berlin',
                'to' => 'Riga',
                'price' => 120.50,
            ]
        ]);
    }
}