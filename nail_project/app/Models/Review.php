<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'review'; 

    // กำหนดฟิลด์ที่สามารถกรอกข้อมูลได้
    protected $fillable = [
        'booking_list_id',
        'user_id',
        'shop_id',
        'detail',
        'rating'
    ];

    // กำหนดชื่อ primary key ที่ตรงกับโครงสร้างตาราง
    protected $primaryKey = 'booking_list_id';
    
    // ปิดการใช้งาน auto-increment เนื่องจาก primary key ไม่ได้เป็น auto increment
    public $incrementing = false;

    // กำหนดประเภทของ primary key เป็น integer
    protected $keyType = 'int';

    // ปิดการใช้งาน timestamps
    public $timestamps = false;

    // ฟังก์ชันสำหรับเชื่อมต่อกับร้านค้า
    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id', 'shop_id');
    }
}
