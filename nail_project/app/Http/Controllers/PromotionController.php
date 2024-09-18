<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BookingList;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PromotionController extends Controller
{
    public function add_promotion()
    {
        $shop = Shop::where('shop_id', 'S0001')->first();

        Log::debug($shop);
        return view('promotion.add_promotion', compact('shop'));  // Use compact() as the second argument
    }
    public function show_promotion()
    {
        $shop = Shop::where('shop_id', 'S0001')->first();

        Log::debug($shop);
        return view('promotion.show_promotion', compact('shop'));  // Use compact() as the second argument
    }
    
}
