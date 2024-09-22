<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Shop;


class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        $provinces = Province::all();
        $districts = District::all();
        $roles = ['user' => 'User', 'admin' => 'Admin'];

        return view('auth.register', compact('provinces', 'districts', 'roles'));
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone_number' => 'required|string|max:10',
            'province_id' => 'required|integer|exists:province,province_id',
            'district_id' => 'required|integer|exists:district,district_id',
            'role' => 'required|string|in:user,admin',
        ], [
            'email.required' => 'กรุณากรอกอีเมล',
            'email.email' => 'กรุณากรอกอีเมลที่ถูกต้อง',
            'email.unique' => 'อีเมลนี้มีผู้ใช้งานแล้ว',
            'password.min' => 'กรุณากรอกรหัสผ่านขั้นต่ำ 8 ตัวอักษร',
            'password.confirmed' => 'การยืนยันรหัสผ่านไม่ตรงกัน',
        ]);

        // Create the user
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'province_id' => $validated['province_id'],
            'district_id' => $validated['district_id'],
            'role' => $validated['role'],
            'password' => Hash::make($validated['password']),
        ]);

        // If the role is admin, create a corresponding shop
        if ($validated['role'] === 'admin') {
            Shop::create([
                'user_id' => $user->id,
                'shop_name' => 'ชื่อร้านของคุณ', // You can set a default name or collect it via the registration form
                'shop_description' => 'รายละเอียดร้าน', // Similarly, set default or collect via form
                'promotion_detail' => 'โปรโมชั่นของร้าน',
                'shop_address' => 'ที่อยู่ของร้าน',
                'pvc' => 'ราคา PVC',
                'clean_nail' => 'ราคาล้างเล็บ',
            ]);
        }

        // Log the user in
        Auth::login($user);

        // Redirect to the desired route after registration
        return redirect()->route('login'); // Change 'dashboard' to your desired route
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'province_id' => ['required', 'integer', 'exists:province,province_id'],
            'district_id' => ['required', 'integer', 'exists:district,district_id'],
            'role' => ['required', 'in:user,admin'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($data['password']),
            'province_id' => $data['province_id'],
            'district_id' => $data['district_id'],
            'role' => $data['role'],
        ]);
    }
    public function getDistricts($provinceId)
    {
        $districts = District::where('province_id', $provinceId)->pluck('district_name', 'district_id');
        return response()->json($districts);
    }

}
