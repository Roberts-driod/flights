<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\BookingController;

Route::get('/', [FlightController::class, 'index'])->name('flights.index');
Route::get('/search', [FlightController::class, 'search'])->name('flights.search');
Route::post('/book', [BookingController::class, 'store'])->name('bookings.store');