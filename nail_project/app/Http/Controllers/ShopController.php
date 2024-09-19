<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    public function index()
    {
             // ดึงข้อมูลจากทั้ง Home และ Shop
    $homes = Shop::with('reviews')->get();
         
    // ส่งข้อมูลไปยัง view
    return view('shop.home', compact('homes'));
    }

    public function shopDetail()
    {
        $shop = Shop::where('shop_id', 'S01')->first();

        Log::debug($shop);
        return view('shop.shopDetails', compact('shop'));  // Use compact() as the second argument
    }

}
