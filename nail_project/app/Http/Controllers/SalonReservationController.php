<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalonReservationController extends Controller
{
    public function index()
    {
        
        return view('manage.booking');
    }
}
