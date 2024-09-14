<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    // สร้างความสัมพันธ์กับ User (หลายคนสามารถอยู่ในอำเภอเดียวกันได้)
    public function users()
    {
        return $this->hasMany(User::class, 'district_id');
    }
}
