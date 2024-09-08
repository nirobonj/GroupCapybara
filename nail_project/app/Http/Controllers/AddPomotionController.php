<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddPomotionController extends Controller
{
    public function index()
    {
        
        return view('pomotion.add_pomotion');
    }
}
