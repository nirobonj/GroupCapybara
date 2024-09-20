<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\BookingList;
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
    // Get the authenticated user
    $user = Auth::user();

    // Validate the request
    $request->validate([
        'date' => 'required|date',
        'time' => 'required|date_format:H:i',
    ]);

    // Create a new booking record
    BookingList::create([
        'shop_id' => $request->shop_id,
        'user_id' => $user->id, // Use user ID instead of the user object
        'date_booking' => $request->date,
        'time_booking' => $request->time . ':00', // Ensure time format is hh:mm:ss
        'date_transaction' => now()->toDateString(), // Store current date
        'time_transaction' => Carbon::now('Asia/Bangkok')->toTimeString(),
    ]);

    // Redirect or return a response
    return redirect()->back()->with('success', 'Booking confirmed!');
}



}
