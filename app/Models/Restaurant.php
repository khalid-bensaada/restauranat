<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class restaurant extends Model
{
    protected $resto = [
        'name_restaurant',
        'city',
        'image_resto',
        'capacity',
        'actif',
        'oppen_hours',
    ];
}
?>