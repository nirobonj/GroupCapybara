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

    public $timestamps = false;

    // Specify the primary key
    protected $primaryKey = 'shop_id';

    // If the primary key is not an auto-incrementing integer
    public $incrementing = false;

    // If the primary key is not a number, set its type
    protected $keyType = 'string';  // or 'int' if it's an intege

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
