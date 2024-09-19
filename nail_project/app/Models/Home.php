<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;
    protected $table = 'shop';
    protected $primaryKey = 'shop_id';
    public $timestamps = false;
    protected $fillable = ['shop_id', 'shop_name', 'promotion_detail', 'shop_address', 'shop_description', 'pvc', 'clean_nail', 'images_name'];

      // เพิ่มฟังก์ชันเพื่อเชื่อมโยงกับ Shop
      public function shop()
      {
          return $this->belongsTo(Shop::class, 'shop_id', 'shop_id');
      }
}
