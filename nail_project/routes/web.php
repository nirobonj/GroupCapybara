<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\homeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;


// Route::resource('/', homeController::class);
// Route::get('/home/create', 'App\Http\Controllers\homeController')->name('home.create');
Route::get('/shops', [HomeController::class, 'index']);
Route::get('/', [HomeController::class, 'index']);
// Route::get('/', function () {
//     return view('shop.home');
// });