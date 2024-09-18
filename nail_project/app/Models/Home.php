<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    protected $table = 'shop';
    protected $primaryKey = 'shop_id';
    public $timestamps = false; // กรณีไม่มี `created_at` และ `updated_at`
    protected $fillable = ['shop_id', 'shop_name', 'promotion_detail', 'shop_address', 'shop_description', 'pvc', 'clean_nail', 'images_name'];
}
