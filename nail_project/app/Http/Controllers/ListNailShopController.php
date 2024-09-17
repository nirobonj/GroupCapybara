<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Illuminate\Http\Request;

class ListNailShopController extends Controller
{
    public function nearbyShops()
    {
        // ดึงข้อมูลร้านค้าและรีวิวที่เกี่ยวข้อง
        $shops = Shop::with('reviews')->get();

        
        return view('listShop.nearby', compact('shops'));
    }
}

