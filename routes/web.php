<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [FlightController::class, 'index']);
Route::get('/search', [FlightController::class, 'search']);
Route::post('/book', [BookingController::class, 'store']);
