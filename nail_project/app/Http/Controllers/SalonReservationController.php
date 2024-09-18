<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\BookingList;
use App\Models\Shop;
use Illuminate\Support\Facades\DB;


class SalonReservationController extends Controller
{
    
    public function index(Request $request,$shop_id)
    {
      
        // $bookings = BookingList::where('shop_id', 'S0001')->get();

        // dd($bookings);
        // $shop = Shop::where('shop_id', 'S0001')->first();
        $shop = Shop::where('shop_id', 'S0001')->first();
        $user = User::where('id', '1')->first();
        $date = $request->query('date', now()->format('Y-m-d'));
        // dd($date);
        $bookings = BookingList::where('shop_id', 'S0001')->whereDate('date_booking', $date)
        ->get();

        $bookings->transform(function ($booking) {
            $booking->date_booking = \Carbon\Carbon::parse($booking->date_booking);
            $booking->time_booking = \Carbon\Carbon::parse($booking->time_booking);
            return $booking;
        });
        // $bookings = BookingList::where('shop_id', 'S0001')
        //                         ->whereDate('date_booking', $date)
        //                         ->get();
        // $bookings = BookingList::where('shop_id', 'S0001')
        //                         ->whereDate('date_booking', $date)
        //                         ->get()
        //                         ->map(function ($booking) {
        //                             $booking->date_booking = \Carbon\Carbon::parse($booking->date_booking);
        //                             $booking->time_booking = \Carbon\Carbon::parse($booking->time_booking);
        //                             return $booking;
        //                         });
        // // dd($user);
        // $bookings = BookingList::where('shop_id', 'S0001')
        //                 ->whereDate('date_booking', $date)
        //                 ->get();
        // dd($bookings);
        return view('manage.mbooking', compact('shop','bookings','user'));
    }
}
