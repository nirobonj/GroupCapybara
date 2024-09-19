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

    public function recomentShops()
    {
    // ดึงข้อมูลร้านค้าพร้อมคำนวณค่าเฉลี่ยรีวิว และเรียงลำดับจากมากไปน้อย
        $shops = Shop::with('reviews')
            ->withAvg('reviews', 'rating') // คำนวณค่าเฉลี่ย rating จาก reviews
            ->orderByDesc('reviews_avg_rating') // เรียงจากค่าเฉลี่ยสูงสุดไปต่ำสุด
            ->get();

        return view('listShop.recoment', compact('shops'));
    }
}

