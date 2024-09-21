<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
// use Log;
use Illuminate\Support\Facades\Log;


class HomeController extends Controller
{
    public function index()
    {
             // ดึงข้อมูลจากทั้ง Home และ Shop
    $homes = Home::with('shop.reviews')->get(); // ดึงข้อมูลบ้านพร้อมร้านค้าและรีวิวที่เกี่ยวข้อง

    // ส่งข้อมูลไปยัง view
    return view('shop.home', compact('homes'));
    }

}
