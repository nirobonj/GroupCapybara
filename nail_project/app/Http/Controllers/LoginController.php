<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // ตรวจสอบข้อมูลที่ส่งมา
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        // ตรวจสอบว่ามีการใช้งานข้อมูลที่กรอกมาหรือไม่
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // เช็ค role ของผู้ใช้
            $user = Auth::user();
            
            if ($user->role == 'admin') {
                return redirect()->intended('/mbooking');
            } else {
                return redirect()->intended('/');
            }
        }
        $user = \App\Models\User::where('email', $request->email)->first();

        if (!$user) {
            // อีเมลไม่พบ
            return back()->withErrors(['email' => 'ไม่พบอีเมลนี้']);
        }

        // อีเมลพบ แต่รหัสผ่านผิด
        return back()->withErrors(['password' => 'รหัสผ่านผิด']);

    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
