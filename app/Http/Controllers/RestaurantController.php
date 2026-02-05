<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends controller
{

    public function index()
    {
        $restaurant = Restaurant::latest()->get();
        return view('index', ['restaurant' => $restaurant]);
    }
    public function create()
    {
        $Restaurant = Restaurant::latest()->get();
        return view('create', ['Restaurant' => $Restaurant]);
    }

    public function store(Request $request)
    {
        $validation = $request->validet([
            'name_restaurant' => 'required|string|max:255',
            'city'            => 'required|string|max:255',
            'image_resto'     => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:3048',
            'cuisine'         => 'required|string|max:255',
            'capacity'        => 'required|string|max:255',
            'oppen_hours'     => 'required|date_format:H:i',
        ]);

        Restaurant::create($validation);

        return redirect()
            ->route('restaurant.index')
            ->with('success', 'Recette créée avec succès');
    }

    public function edit(Restaurant $restaurant)
    {
        return view('restaurant.edit', compact('restaurant'));
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $validation = $request->vaidate([
            'name_restaurant' => 'required|string|max:255',
            'city'            => 'required|string|max:255',
            'image_resto'     => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'cuisine'         => 'required|string|max:255',
            'capacity'        => 'required|string|max:255',
            'oppen_hours'     => 'required|date_format:H:i',
        ]);

        $restaurant->update($validation);
        return redirect()
            ->route('restaurant.create')
            ->with('success', 'Recette mise à jour avec succès');
    }

    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()
            ->route('restaurant.create')
            ->with('success', 'Recette supprimée avec succès');
    }

    public function show(Restaurant $restaurant)
    {
        return view('restaurant.show', compact('restaurant'));
    }

    public function indexx(Request $request)
    {
        $restos = Restaurant::query()

            ->when($request->filled('ville'), function ($q) use ($request) {
                $q->where('ville', 'like', '%' . $request->ville . '%');
            })

            ->when($request->filled('cuisine'), function ($q) use ($request) {
                $q->where('cuisine', 'like', '%' . $request->cuisine . '%');
            })

            ->paginate($request->input('per_page', 10))

            ->withQueryString();

        return view('restaurants.index', compact('restos'));
    }
}
