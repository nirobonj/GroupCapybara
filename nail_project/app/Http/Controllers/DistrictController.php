<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function getDistricts($province_id)
    {
        $districts = District::where('province_id', $province_id)->pluck('district_name', 'district_id');
        return response()->json($districts);
    }
}
