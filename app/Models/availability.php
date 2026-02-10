<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class availability extends Model
{
    protected $fillable = [
        'start_time',
        'capacity',
        'booked_count',
    ];
}
