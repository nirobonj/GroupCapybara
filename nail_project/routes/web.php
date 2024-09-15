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
use App\Http\Controllers\ListNailShopController;

//Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/history', [HistoryController::class, 'index']);
// Route::get('/history', function () {
//     return view('his.history');
// });


Route::get('/mbooking', [SalonReservationController::class, 'index'])->name('mbooking');
Route::get('/add_pomotion', [AddPomotionController::class, 'index'])->name('add_pomotion');
Route::get('/show_pomotion', [ShowPomotionController::class, 'index'])->name('show_pomotion');

// nearbyShops
Route::get('/nearbyShops', [ListNailShopController::class, 'nearbyShops']);

//shop details
Route::get('/shopDetails', [HomeController::class, 'shopDetail'])->name('shopDetail');
