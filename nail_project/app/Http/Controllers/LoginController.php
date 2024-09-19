<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\User;
use App\Models\Shop;
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
            
            if ($user->role == 'admin') {
                return redirect()->intended('/mbooking/S0001');
            } else {
                return redirect()->intended('/');
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