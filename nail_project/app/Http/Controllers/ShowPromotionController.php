<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowPromotionController extends Controller
{
    public function index()
    {
        
        return view('promotion.show_promotion');
    }
}

