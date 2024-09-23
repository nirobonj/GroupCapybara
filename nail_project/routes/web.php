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
use App\Http\Controllers\EditProfileUserController;
use App\Http\Controllers\AddPromotionController;
use App\Http\Controllers\ShowPromotionController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ListNailShopController;
use App\Http\Controllers\ReviewController;

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('get-districts/{provinceId}', [RegisterController::class, 'getDistricts']);

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'login']);

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/mbooking', [SalonReservationController::class, 'index'])->name('mbooking');
});
Route::group(['middleware' => ['role:user']], function () {
    Route::get('/home', [ShopController::class, 'index'])->name('home');
});
Route::post('logout', [LoginController::class, 'logout'])->name('logout');



//Route::get('/admin', [SalonReservationController::class, 'index'])->middleware('role:admin');
Route::get('/home/{id}', [ShopController::class, 'index'])->name('home');
// Route::get('/home', [ShopController::class, 'index'])->name('home');
Route::get('/bookinguser/{id}', [HistoryController::class, 'booking'])->name('bookinguser');
Route::post('/submit_review', [ReviewController::class, 'submitReview'])->name('submit-review');

Route::get('/edit_profile/{id}', [EditProfileUserController::class, 'index'])->name('edit_profile');
Route::put('/edit_profile/{id}', [EditProfileUserController::class, 'update'])->name('edit_profile.update');

//home & manage  for manicurist/Merchants.
Route::get('/mbooking/{shop_id}', [SalonReservationController::class, 'index'])->name('mbooking');

//promotion
Route::get('/add_promotion/{shop_id}', [PromotionController::class, 'add_promotion'])->name('add_promotion');
Route::put('/update_promotion/{shop_id}', [PromotionController::class, 'update_promotion'])->name('update_promotion');
Route::get('/show_promotion/{shop_id}', [PromotionController::class, 'show_promotion'])->name('show_promotion');


// nearbyShops & RecomentShops
Route::get('/nearbyShops', [ListNailShopController::class, 'nearbyShops'])->name('nearbyShops');
Route::get('/recomentShops', [ListNailShopController::class, 'recomentShops'])->name('recomentShops');
Route::get('/allShops', [ListNailShopController::class, 'allShops'])->name('allShops');

//shop details
/* Route::get('/shopDetails', [ShopController::class, 'shopDetail'])->name('shopDetail'); */
Route::get('/shopDetail/{id}', [ShopController::class, 'shopDetail'])->name('shopDetail');
Route::post('/add_booking', [ShopController::class, 'booking'])->name('add_booking');

// edit
Route::get('/edit/{shop_id}', [ShopController::class, 'edit'])->name('editShop');
Route::put('/update/{shop_id}', [ShopController::class, 'update'])->name('shop.update');

// Display the create shop form
Route::get('/createShop/{user_id}', [ShopController::class, 'create'])->name('shop.create');
Route::post('/createShop/{user_id}', [ShopController::class, 'store'])->name('shop.store');




