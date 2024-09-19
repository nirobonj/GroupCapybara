<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BookingList;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PromotionController extends Controller
{
    public function add_promotion(Request $request, $shop_id)
    {
        $user = Auth::user();
        $shop = $user->shop;
        $shop = Shop::where('shop_id', $shop->shop_id)->first();
        return view('promotion.add_promotion', compact('shop'));  // Use compact() to pass variables to the view
    }

    public function show_promotion(Request $request, $shop_id)
    {
        $user = Auth::user();
        $shop = $user->shop;
        $shop = Shop::where('shop_id', $shop->shop_id)->first();
        return view('promotion.show_promotion', compact('shop'));  // Use compact() to pass variables to the view
    }
}

