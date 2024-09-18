<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'phone_number' => 'required|string|max:10',
            'province_id' => 'required|integer|exists:province,province_id',
            'district_id' => 'required|integer|exists:district,district_id',
            'role' => 'required|string|in:user,admin',
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number, // ใช้ `phone_number` ตามที่ตั้งในฐานข้อมูล
            'province_id' => $request->province_id,
            'district_id' => $request->district_id,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);
    
        Auth::login($user);
        return redirect()->route('login');
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
