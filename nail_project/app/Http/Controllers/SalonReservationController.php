<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class SalonReservationController extends Controller
{
    public function index()
    {
        
        return view('manage.booking');
    }
    // public function show()
    // {
    //     $currentMonth = Carbon::now()->month;
    //     $currentYear = Carbon::now()->year;
    //     $daysInMonth = Carbon::create($currentYear, $currentMonth)->daysInMonth;
    //     $startDay = Carbon::create($currentYear, $currentMonth, 1)->dayOfWeek;

    //     return view('manage.booking', compact('currentMonth', 'currentYear', 'daysInMonth', 'startDay'));
    // }
}
