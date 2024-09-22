<?php

namespace App\Http\Controllers;

use App\Models\Shop;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ListNailShopController extends Controller
{
    public function nearbyShops()
    {
        $user = Auth::user(); // ดึงข้อมูลผู้ใช้ที่ล็อกอินอยู่
        $userDistrictId = $user->district_id; // ดึง district_id ของผู้ใช้ที่ล็อกอิน

        // ดึงข้อมูลร้านค้า โดยเชื่อมกับตาราง users ผ่าน user_id
        $shops = Shop::select('shop.*') // เลือกข้อมูลร้านค้า
            ->addSelect(\DB::raw("ABS(users.district_id - $userDistrictId) as distance")) // คำนวณระยะห่างระหว่าง district_id
            ->join('users', 'users.id', '=', 'shop.user_id') // เชื่อม shop.user_id กับ users.id
            ->orderBy('distance') // เรียงลำดับตามระยะห่าง
            ->with('reviews') // ดึงข้อมูลรีวิว
            ->get();

        return view('listShop.nearby', compact('shops', 'user'));
    }


    public function recomentShops()
    {
        $user = Auth::user();
    // ดึงข้อมูลร้านค้าพร้อมคำนวณค่าเฉลี่ยรีวิว และเรียงลำดับจากมากไปน้อย
        $shops = Shop::with('reviews')
            ->withAvg('reviews', 'rating') // คำนวณค่าเฉลี่ย rating จาก reviews
            ->orderByDesc('reviews_avg_rating') // เรียงจากค่าเฉลี่ยสูงสุดไปต่ำสุด
            ->get();

        return view('listShop.recoment', compact('shops','user'));
    }

    public function allShops()
    {
        $user = Auth::user();
    // ดึงข้อมูลร้านค้าพร้อมคำนวณค่าเฉลี่ยรีวิว และเรียงลำดับจากมากไปน้อย
        $shops = Shop::with('reviews')
            ->withAvg('reviews', 'rating') // คำนวณค่าเฉลี่ย rating จาก reviews
            ->orderByDesc('reviews_avg_rating') // เรียงจากค่าเฉลี่ยสูงสุดไปต่ำสุด
            ->get();

        return view('listShop.allshop', compact('shops','user'));
    }
}

