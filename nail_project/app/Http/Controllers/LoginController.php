<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // ตรวจสอบข้อมูลที่ส่งมา
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ], [
            'password.min' => 'กรุณากรอกรหัสผ่านขั้นต่ำ 8 ตัวอักษร',
            'email.required' => 'กรุณากรอกอีเมล',
            'email.email' => 'กรุณากรอกอีเมลที่ถูกต้อง',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // เช็ค role ของผู้ใช้
            $user = Auth::user();
            $shop = $user->shop;
            if ($user->role == 'admin') {
                if ($shop) {
                    return redirect()->intended('/mbooking/' . $shop->shop_id);
                }
                // กรณีที่ผู้ใช้ไม่มีข้อมูล shop
                return redirect()->intended('/home/' . $user->id);
            } else {
                return redirect()->intended('/home/' . $user->id);
            }
        }

        // ตรวจสอบการมีอยู่ของอีเมลในฐานข้อมูล
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'ไม่พบอีเมลนี้']);
        }

        return back()->withErrors(['password' => 'รหัสผ่านผิด']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}