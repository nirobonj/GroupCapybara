<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Log;

class ShopController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลจากทั้ง Home และ Shop
        $homes = Shop::with('reviews')->get();

        // ดึ   งข้อมูลร้านค้าพร้อมกับรีวิวและสุ่มเรียงลำดับ
        $promotions = Shop::with('reviews')->get()->shuffle();

        // ดึงข้อมูลร้านค้าพร้อมกับรีวิวและจัดเรียงตามคะแนน
        $tops = Shop::with('reviews')
        ->get()
        ->sortByDesc(function ($top) {
            return $top->reviews->avg('rating');
        })
        ->take(3);

        $recomments = Shop::with('reviews')
            ->get()
            ->sortByDesc(function ($rec) {
                return $rec->reviews->avg('rating');
            });

        // ส่งข้อมูลไปยัง view
        return view('shop.home', compact('homes', 'promotions', 'tops', 'recomments'));
    }

    public function shopDetail($id)
    {
        $shop = Shop::where('shop_id', $id )->first();

        Log::debug($shop);
        return view('shop.shopDetails', compact('shop'));  // Use compact() as the second argument
    }

    public function booking(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        // Create a new booking record
        Booking_list::create([
            'booking_list_id' => 'id',
            'shop_id' => $user,
            'user_id' => $user,
            'date_booking' => $request->date,
            'time_booking' => $request->time,
            'date_transaction' => now(), // or use a different field if needed
            'time_transaction' => now(), // or use a different field if needed
        ]);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Booking confirmed!');
    }

}
