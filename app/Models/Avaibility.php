<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaibility extends Model
{
    protected $fillable = [
        'restaurant_id',
        'date',
        'start_time',
        'capacity',
    ];
}
