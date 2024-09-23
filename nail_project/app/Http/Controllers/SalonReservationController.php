<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BookingList;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;

class SalonReservationController extends Controller
{
    public function index(Request $request)
    {
        // ดึงข้อมูลของผู้ใช้ที่ล็อกอินอยู่
        $user = Auth::user();
        $shop = $user->shop;
        $shop = Shop::where('shop_id', $shop->shop_id)->first();
        $date = $request->query('date', now()->format('Y-m-d'));
        $bookings = BookingList::where('shop_id', $shop->shop_id)
                            ->whereDate('date_booking', $date)
                            ->orderBy('time_booking', 'asc') // เรียงตามเวลา
                            ->get();

        // แปลงวันที่และเวลาของการจองให้เป็น Carbon instance
        $bookings->transform(function ($booking) {
            $booking->date_booking = Carbon::parse($booking->date_booking);
            $booking->time_booking = Carbon::parse($booking->time_booking);
            return $booking;
        });

        return view('manage.mbooking', compact('shop', 'bookings', 'user'));
    }
}
