<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
   
    use HasFactory;
    
    protected $table = 'booking_list';
    protected $primaryKey = 'booking_list_id';
    public $timestamps = false;
    
    protected $fillable = [
        'booking_list_id', 'shop_id', 'user_id', 
        'date_transaction', 'time_transaction', 
        'date_booking', 'time_booking'
    ];

    // relation with model Home from shop_id and shop_name
    public function shop()
    {
        return $this->belongsTo(Home::class, 'shop_id', 'shop_id');
    }
    
}


