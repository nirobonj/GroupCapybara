<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Log;

class HomeController extends Controller
{
    public function index()
    {
        $homes = Home::all();
        return view('shop.home', compact('homes'));
    }

    public function shopDetail()
    {
        $shop = Shop::where('shop_id', 'S0001')->first();

        Log::debug($shop);
        return view('shop.shopDetails', compact('shop'));  // Use compact() as the second argument
    }
}
