<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    public function shopDetail()
    {
        $shop = Shop::where('shop_id', 'S0001')->first();

        Log::debug($shop);
        return view('shop.shopDetails', compact('shop'));  // Use compact() as the second argument
    }

}
