<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review'; 

    // ฟังก์ชันสำหรับเชื่อมต่อกับร้านค้า
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'shop_id'); // ชี้ไปที่ฟิลด์ shop_id ใน shop
    }
}

