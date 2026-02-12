<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'reservation_id',
        'amount',
        'currency',
        'payment_method',
        'status',
        'paid_at',
    ];
}
