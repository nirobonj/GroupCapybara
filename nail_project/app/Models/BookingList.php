<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingList extends Model
{
    use HasFactory;

    protected $table = 'booking_list';

    protected $primaryKey = 'booking_list_id';

    // public $timestamps = false;

    // Disable timestamps
    public $timestamps = false;

    // Define fillable fields
    protected $fillable = [
        'shop_id',
        'user_id',
        'date_booking',
        'time_booking',
        'date_transaction',
        'time_transaction'
    ];

    protected $casts = [
        'time_transaction' => 'datetime:H:i:s',
        'time_booking' => 'datetime:H:i:s',
    ];

    protected $dates = [
        'date_transaction',
        'date_booking',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class, 'shop_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
