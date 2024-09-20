<?php

namespace App\Http\Controllers;

use App\Models\History;
use Auth;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function booking()
    {
        $user = Auth::user();
        // ดึงข้อมูลทั้งหมดจาก Model History + Model Home
        $bookingLists = History::leftJoin('shop', 'booking_list.shop_id', '=', 'shop.shop_id')
        ->select('booking_list.*', 'shop.shop_name')
        ->get();

        return view('bookuser.history', compact('bookingLists', 'user'));
    }
}
