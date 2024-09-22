<?php

namespace App\Http\Controllers;

use App\Models\Shop;
// use Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ListNailShopController extends Controller
{
    public function nearbyShops(Request $request)
{
    $user = Auth::user(); // ดึงข้อมูลผู้ใช้ที่ล็อกอินอยู่
    $userDistrictId = $user->district_id; // ดึง district_id ของผู้ใช้ที่ล็อกอิน

    // ดึงข้อมูลร้านค้า โดยเชื่อมกับตาราง users ผ่าน user_id
    $shopsQuery = Shop::select('shop.*')
        ->addSelect(\DB::raw("ABS(users.district_id - $userDistrictId) as distance"))
        ->join('users', 'users.id', '=', 'shop.user_id')
        ->orderBy('distance')
        ->with('reviews');

    // ตรวจสอบว่ามีการค้นหาหรือไม่
    if ($request->has('search') && $request->input('search') !== '') {
        $search = $request->input('search');
        $shopsQuery->where('shop.shop_name', 'LIKE', "$search%"); // ค้นหาตามชื่อร้านที่ขึ้นต้นด้วยอักษร
    }

    $shops = $shopsQuery->get();

    return view('listShop.nearby', compact('shops', 'user'));
}

public function recomentShops(Request $request)
{
    $user = Auth::user();

    // ดึงข้อมูลร้านค้าพร้อมคำนวณค่าเฉลี่ยรีวิว และเรียงลำดับจากมากไปน้อย
    $shopsQuery = Shop::with('reviews')
        ->withAvg('reviews', 'rating')
        ->orderByDesc('reviews_avg_rating');

    // ตรวจสอบว่ามีการค้นหาหรือไม่
    if ($request->has('search') && $request->input('search') !== '') {
        $search = $request->input('search');
        $shopsQuery->where('shop.shop_name', 'LIKE', "$search%"); // ค้นหาตามชื่อร้านที่ขึ้นต้นด้วยอักษร
    }

    $shops = $shopsQuery->get();

    return view('listShop.recoment', compact('shops', 'user'));
}


}

