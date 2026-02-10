<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{

    protected $fillable = [
        'name',
        'city',
        'capacity',
        'cuisine',
        'open_hours',
        'close_hours',
        'image',
        'user_id'
    ];
}
