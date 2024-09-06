<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalonReservationController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/manage_reservations', [SalonReservationController::class, 'index'])->name('manage_reservations');