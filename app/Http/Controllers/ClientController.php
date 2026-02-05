<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class ClientController extends Controller
{

    public function indexx(Request $request)
    {
        $restos = Restaurant::query()

            ->when($request->filled('city'), function ($q) use ($request) {
                $q->where('city', 'like', '%' . $request->ville . '%');
            })

            ->when($request->filled('cuisine'), function ($q) use ($request) {
                $q->where('cuisine', 'like', '%' . $request->cuisine . '%');
            })

            ->paginate($request->input('per_page', 10))

            ->withQueryString();

        return view('restaurants.index', compact('restos'));
    }
    
}
