<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\homeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\SalonReservationController;
use App\Http\Controllers\AddPomotionController;
use App\Http\Controllers\ShowPomotionController;
use App\Http\Controllers\CalendarController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/history', [HistoryController::class, 'index']);
// Route::get('/history', function () {
//     return view('his.history');
// });
// Route::get('/', [SalonReservationController::class, 'index'])->name('booking');
Route::get('/booking', [SalonReservationController::class, 'index'])->name('booking');
// Route::get('/booking', [SalonReservationController::class, 'show'])->name('booking');
Route::get('/add_pomotion', [AddPomotionController::class, 'index'])->name('add_pomotion');
Route::get('/show_pomotion', [ShowPomotionController::class, 'index'])->name('show_pomotion');
