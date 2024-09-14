<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public function users()
    {
        return $this->hasMany(User::class, 'province_id');
    }
}
