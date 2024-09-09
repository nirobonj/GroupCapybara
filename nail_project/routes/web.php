<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalonReservationController;
use App\Http\Controllers\AddPomotionController;
use App\Http\Controllers\ShowPomotionController;

// เดี๋ยวหน้าแรก '/'ต้องเป็น login
Route::get('/', [SalonReservationController::class, 'index'])->name('booking');
Route::get('/booking', [SalonReservationController::class, 'index'])->name('booking');
Route::get('/add_pomotion', [AddPomotionController::class, 'index'])->name('add_pomotion');
Route::get('/show_pomotion', [ShowPomotionController::class, 'index'])->name('show_pomotion');