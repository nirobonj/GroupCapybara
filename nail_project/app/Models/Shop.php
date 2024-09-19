<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'shop';


    protected $fillable = [
        'shop_id',
        'shop_name',
        'promotion_detail',
        'shop_address',
        'shop_description',
        'pvc',
        'clean_nail',
    ];

        // ฟังก์ชันสำหรับเชื่อมต่อกับรีวิว
    public function reviews()
    {
        return $this->hasMany(Review::class, 'shop_id', 'shop_id'); // ชี้ไปที่ฟิลด์ shop_id ใน review
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
