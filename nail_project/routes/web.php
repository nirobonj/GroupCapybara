<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/shopDetails', [ShopController::class, 'shopDetail'])->name('shopDetail');
