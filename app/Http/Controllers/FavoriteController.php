<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function toggle($id)
    {
        $user = auth()->user();
        $restaurant = Restaurant::findOrFail($id);

        $user->favorites()->toggle($restaurant->id);

        return redirect()->back();
    }
}
