<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'province';

    protected $primaryKey = 'province_id'; // ใช้ primary key ที่ถูกต้อง

    public $timestamps = false; // ตั้งค่าเป็น false ถ้าไม่มี timestamps

    public function districts()
    {
        return $this->hasMany(District::class, 'province_id');
    }
}
