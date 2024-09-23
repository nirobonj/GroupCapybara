<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EditProfileUserController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id); // ดึงข้อมูลผู้ใช้ตาม ID
        $shop = $user->shop;  
        $provinces = Province::all();
        $districts = District::where('province_id', $user->province_id)->get();  // ดึงอำเภอที่อยู่ในจังหวัดเดียวกับผู้ใช้
        return view('user.edit_profile', compact('user', 'provinces', 'districts','shop'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
            'password_confirmation' => 'required|string', // เพิ่มการตรวจสอบรหัสผ่านยืนยัน
            'phone_number' => 'required|string|max:10',
            'province_id' => 'required|exists:province,province_id',
            'district_id' => 'required|exists:district,district_id',
        ]);

        if (!Hash::check($request->password_confirmation, $user->password)) {
            return redirect()->back()->withErrors(['password_confirmation' => 'รหัสผ่านไม่ถูกต้อง']);
        }

        // อัปเดตข้อมูล
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password); // ถ้ามีการเปลี่ยนรหัสผ่าน
        }
        $user->phone_number = $request->phone_number;
        $user->province_id = $request->province_id;
        $user->district_id = $request->district_id;

        $user->save();
        $shop = $user->shop;
        if ($user->role == 'admin') {
            if ($shop) {
                return redirect()->intended('/mbooking/' . $shop->shop_id)->with('success', 'ข้อมูลโปรไฟล์ถูกอัปเดตเรียบร้อยแล้ว');
            }
        } else {
            return redirect()->intended('/home/' . $user->id)->with('success', 'ข้อมูลโปรไฟล์ถูกอัปเดตเรียบร้อยแล้ว');
        }
    }
}
