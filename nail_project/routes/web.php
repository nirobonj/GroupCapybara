<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\homeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController;


Route::get('/', [HomeController::class, 'index']);
Route::get('/history', [HistoryController::class, 'index']);
// Route::get('/history', function () {
//     return view('his.history');
// });