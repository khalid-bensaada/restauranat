<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        auth()->user()->favorites()->toggle($restaurant->id);

        return back();
    }
}
