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
            'capacity'        => 'required|string|max:255',
            'oppen_hours'     => 'required|date_format:H:i',
        ]);

        Restaurant::create($validation);

        return redirect()
            ->route('restaurant.index')
            ->with('success', 'Recette créée avec succès');
    }

    public function edit(Restaurant $restaurant) {
        return view('restaurant.edit' , compact('restaurant'));
    }

    public function update(Request $request , Restaurant $restaurant)
    {
        $validation = $request->vaidate([
            'name_restaurant' => 'required|string|max:255',
            'city'            => 'required|string|max:255',
            'image_resto'     => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
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
}
