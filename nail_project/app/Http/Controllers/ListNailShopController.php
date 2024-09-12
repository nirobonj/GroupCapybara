<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListNailShopController extends Controller
{
    public function nearbyShops()
    {
        // ส่งข้อมูลไปที่หน้า view (ถ้ามี)
        return view('listShop.nearby');
    }
}
