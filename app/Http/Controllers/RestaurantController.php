<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;


class RestaurantController extends Controller
{

    public function index()
    {
        $restaurant = Restaurant::latest()->get();
        return view('index', ['restaurant' => $restaurant]);
    }
    public function create()
    {
        $Restaurant = Restaurant::latest()->get();
        return view('restaurateurs.create', compact('Restaurant'));
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name_restaurant' => 'required|string|max:255',
            'city'            => 'required|string|max:255',
            'cuisine'         => 'required|string|max:255',
            'capacity'        => 'required|string|max:255',
            'oppen_hours'     => 'required|date_format:H:i',

            'image_resto'     => 'required|image',
        ]);

        Restaurant::create($validation);

        return redirect('/restaurateurs/create');
        

    }

    public function edit(Restaurant $restaurant)
    {
        return view('restaurateurs.edit', compact('restaurant'));
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $validation = $request->validate([
            'name_restaurant' => 'required|string|max:255',
            'city'            => 'required|string|max:255',
            'cuisine'         => 'required|string|max:255',
            'capacity'        => 'required|string|max:255',
            'oppen_hours'     => 'required|date_format:H:i',

            'image_resto'     => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',



        ]);

        $restaurant->update($validation);
        return redirect('/restaurateurs/create');
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect('/restaurateurs/create');
    }

    public function show(Restaurant $restaurant)
    {
        return view('restaurateurs.show', compact('restaurant'));
    }

    public function indexx(Request $request)
    {
        $restaurants = Restaurant::query()

            ->when($request->city, function ($q) use ($request) {
                $q->where('city', 'like', "%{$request->city}%");
            })

            ->paginate($request->per_page ?? 10)
            ->withQueryString();

        return view('restaurateurs.create', compact('restaurant'));
    }
}
