<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'district';

    protected $primaryKey = 'district_id'; // ใช้ primary key ที่ถูกต้อง
    public $timestamps = false; // ตั้งค่าเป็น false ถ้าไม่มี timestamps

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }
}
