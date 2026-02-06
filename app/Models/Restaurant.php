<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'name_restaurant',
        'city',
        'cuisine',
        'capacity',
        'oppen_hours',
        'image_resto',
        
        
        'actif',
        
    ];

    
}
?>