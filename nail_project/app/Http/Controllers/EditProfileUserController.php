<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EditProfileUserController
{
    public function index()
    {
        $user = Auth::user();

        return view('user.edit_profile', ['user' => $user]);
    }
}