<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BookingList;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;


class PromotionController extends Controller
{
    public function add_promotion(Request $request, $shop_id)
    {
        $user = Auth::user();
        $shop = $user->shop;
        $shop = Shop::where('shop_id', $shop->shop_id)->first();
        return view('promotion.add_promotion', compact('shop','user'));  // Use compact() to pass variables to the view
    }

    public function show_promotion(Request $request, $shop_id)
    {
        $user = Auth::user();
        $shop = Shop::where('shop_id', $shop_id)->first();


        if ($shop) {
            return view('promotion.show_promotion', compact('shop','user'));
        } else {
            // ถ้าไม่พบร้านค้าที่ตรงกับ shop_id แสดงข้อความหรือ redirect
            return redirect()->route('/')->with('error', 'ไม่พบร้านค้าที่ต้องการ');
        }
    }

    public function update_promotion(Request $request, $shop_id)
    {
        $user = Auth::user();

        // ตรวจสอบว่าผู้ใช้มีร้านค้าอยู่หรือไม่
        $shop = Shop::where('shop_id', $shop_id)->first();
        $date = $request->query('date', now()->format('Y-m-d'));
        // ตรวจสอบว่าพบร้านหรือไม่
        if (!$shop) {
            return redirect()->back()->with('error', 'ไม่พบร้านค้าที่ต้องการอัปเดต');
        }

        // ตรวจสอบข้อมูลการป้อนจากฟอร์ม
        $validated = $request->validate([
            'promotion_detail' => 'required|string|max:1000', 
        ]);

        // อัปเดตโปรโมชัน
        $shop->promotion_detail = $request->input('promotion_detail');
        $shop->save(); // บันทึกการเปลี่ยนแปลง

         $bookings = BookingList::where('shop_id', $shop->shop_id)
                ->whereDate('date_booking', $date)
                ->get();

        // แปลงวันที่และเวลาของการจองให้เป็น Carbon instance
        $bookings->transform(function ($booking) {
        $booking->date_booking = Carbon::parse($booking->date_booking);
        $booking->time_booking = Carbon::parse($booking->time_booking);
        return $booking;
        });
        // ส่งกลับไปยังหน้าที่ผู้ใช้มาหรือแสดงข้อความสำเร็จ
        session()->flash('success', 'โปรโมชันได้รับการอัปเดตเรียบร้อยแล้ว');
        return redirect()->route('mbooking', [$shop->shop_id, 'user', 'bookings']);
    }
}

