<?php

namespace App\Http\Controllers;

use App\Models\History;
use Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function booking()
    {
        // ดึงข้อมูลผู้ใช้ที่เข้าสู่ระบบ
        $user = Auth::user();

        // ดึงข้อมูลการจองที่ตรงกับ user_id ของผู้ใช้ที่เข้าสู่ระบบ
        $bookingLists = History::leftJoin('shop', 'booking_list.shop_id', '=', 'shop.shop_id')
            ->where('booking_list.user_id', $user->id) // เงื่อนไขตรงกับ user_id
            ->select('booking_list.*', 'shop.shop_name')
            ->get();

        // ส่งข้อมูลไปยังหน้า view
        return view('bookuser.history', compact('bookingLists', 'user'));
    }
}
