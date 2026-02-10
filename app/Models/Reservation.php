<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'reservation_day',
        'reservation_time',
        'prsn_number',
        'status',
        'expires_at',
        'user_id',
        'restaurant_id',
    ];
}
