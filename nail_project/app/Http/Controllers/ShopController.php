<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Log;

class ShopController extends Controller
{
    /* public function shopDetail()
    {
        $shop = Shop::with('reviews')->where('shop_id', 'S0001')->get();

        Log::debug($shop);
        return view('shop.shopDetails', compact('shop'));  // Use compact() as the second argument
    } */

    public function shopDetail()
    {
        $shop = Shop::where('shop_id', 'S0001')->first();

        Log::debug($shop);
        return view('shop.shopDetails', compact('shop'));  // Use compact() as the second argument
    }

    public function booking(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
        ]);

        // Create a new booking record
        Booking::create([
            'date' => $request->date,
            'time' => $request->time,
            'created_at' => now(), // or use a different field if needed
            'updated_at' => now(), // or use a different field if needed
        ]);

        // Redirect or return a response
        return redirect()->back()->with('success', 'Booking confirmed!');
    }

}
