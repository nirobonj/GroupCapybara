<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Log;

class ShopController extends Controller
{
    public function shopDetail()
    {
        return view('shop.shop');
    }
}
