<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowPomotionController extends Controller
{
    public function index()
    {
        
        return view('pomotion.show_pomotion');
    }
}

