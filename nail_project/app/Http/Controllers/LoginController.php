<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // ตรวจสอบว่ามีการใช้งานข้อมูลที่กรอกมาหรือไม่
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // เช็ค role ของผู้ใช้
            $user = Auth::user();
            
            if ($user->role == 'admin') {
                return redirect()->intended('/mbooking'); // เปลี่ยนเส้นทางไปหน้า mbooking ถ้าเป็น admin
            } else {
                return redirect()->intended('/home'); // เปลี่ยนเส้นทางไปหน้า home ถ้าเป็น user
            }
        }

        // หากเข้าสู่ระบบไม่สำเร็จ ให้กลับไปยังหน้า login พร้อม error
        return back()->withErrors([
            'email' => 'ข้อมูลการเข้าสู่ระบบไม่ถูกต้อง',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
