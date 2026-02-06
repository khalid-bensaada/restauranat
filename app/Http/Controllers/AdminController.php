<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'restaurants' => Restaurant::count(),
            'users' => User::count(),
        ]);
    }

    public function toggleStatus(Restaurant $restaurant)
    {
        $restaurant->status =
            $restaurant->status === 'active'
            ? 'maintenance'
            : 'active';

        $restaurant->save();

        return back();
    }
}
