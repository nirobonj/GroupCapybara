<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\homeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\SalonReservationController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\AddPromotionController;
use App\Http\Controllers\ShowPromotionController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ListNailShopController;


Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('get-districts/{provinceId}', [RegisterController::class, 'getDistricts']);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/mbooking', [SalonReservationController::class, 'index'])->name('mbooking');
});
Route::group(['middleware' => ['role:user']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



//Route::get('/admin', [SalonReservationController::class, 'index'])->middleware('role:admin');
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/history', [HistoryController::class, 'index']);
// Route::get('/history', function () {
//     return view('his.history');
// });


Route::get('/mbooking/{shop_id}', [SalonReservationController::class, 'index'])->name('mbooking');
Route::get('/add_promotion', [PromotionController::class, 'add_promotion'])->name('add_promotion');
Route::get('/show_promotion', [PromotionController::class, 'show_promotion'])->name('show_promotion');
// Route::get('/add_promotion', [AddPromotionController::class, 'index'])->name('add_promotion');
// Route::get('/show_promotion', [ShowPromotionController::class, 'index'])->name('show_promotion');

// nearbyShops
Route::get('/nearbyShops', [ListNailShopController::class, 'nearbyShops']);

//shop details
Route::get('/shopDetails', [HomeController::class, 'shopDetail'])->name('shopDetail');
