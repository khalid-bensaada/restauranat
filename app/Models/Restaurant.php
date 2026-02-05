<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name_restaurant',
        'city',
        'image_resto',
        'cuisine',
        'capacity',
        'actif',
        'oppen_hours',
    ];

    
}
?>