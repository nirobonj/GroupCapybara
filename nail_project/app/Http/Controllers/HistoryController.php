<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        // ดึงข้อมูลทั้งหมดจากโมเดล History
        $historys = History::all();
        return view('his.history', compact('historys'));
    }
}
