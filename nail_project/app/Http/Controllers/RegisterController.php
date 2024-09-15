<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\District;

class RegisterController extends Controller
{
    //
    public function showRegistrationForm()
    {
        $provinces = Province::all();
        $districts = District::all();
        $roles = ['user' => 'User', 'admin' => 'Admin'];

        return view('auth.register', compact('provinces', 'districts', 'roles'));
    }    

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        Auth::login($user);
        return redirect()->route('home');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:10'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'province_id' => ['required', 'integer', 'exists:provinces,id'],
            'district_id' => ['required', 'integer', 'exists:districts,id'],
            'role' => ['required', 'in:user,admin'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'province_id' => $data['province_id'],
            'district_id' => $data['district_id'],
            'role' => $data['role'],
        ]);
    }

}
