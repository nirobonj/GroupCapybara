<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddPromotionController extends Controller
{
    public function index()
    {
        
        return view('promotion.add_promotion');
    }
}
