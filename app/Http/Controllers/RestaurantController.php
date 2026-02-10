<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::latest()->get();
        return view('index', compact('restaurants'));
    }

    public function create(Request $request)
    {
        $restaurants = Restaurant::where('user_id', auth()->id())
            ->when($request->city, function ($q) use ($request) {
                $q->where('city', 'like', "%{$request->city}%");
            })
            ->latest()
            ->paginate($request->per_page ?? 10)
            ->withQueryString();

        return view('restaurateurs.create', compact('restaurants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'city'        => 'required',
            'cuisine'     => 'required',
            'capacity'    => 'required|integer',
            'open_hours'  => 'required',
            'close_hours' => 'required',
            'image'       => 'nullable|image',
        ]);

        try {
            $restaurant = new Restaurant();
            $restaurant->name = $request->name;
            $restaurant->city = $request->city;
            $restaurant->cuisine = $request->cuisine;
            $restaurant->capacity = $request->capacity;
            $restaurant->open_hours = $request->open_hours;
            $restaurant->close_hours = $request->close_hours;


            $restaurant->user_id = auth()->id();

            if ($request->hasFile('image')) {
                $restaurant->image = $request->file('image')->store('restaurants', 'public');
            }

            $restaurant->save();
            return redirect()->back()->with('success', 'Saved successfully!');
        } catch (\Exception $e) {
            dd("Database Error: " . $e->getMessage());
        }
    }

    public function edit(Restaurant $restaurant)
    {
        return view('restaurateurs.edit', compact('restaurant'));
    }

    public function update(Request $request, Restaurant $restaurant)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'city'        => 'required|string|max:255',
            'cuisine'     => 'required|string|max:255',
            'capacity'    => 'required|numeric',
            'open_hours'  => 'required|string|max:255',
            'close_hours' => 'required|string|max:255',
            'image'       => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            if ($restaurant->image) {
                Storage::disk('public')->delete($restaurant->image);
            }
            $validated['image'] = $request->file('image')->store('restaurants', 'public');
        }

        $restaurant->update($validated);

        return redirect()->route('restaurateurs.create')->with('success', 'Updated successfully');
    }

    public function destroy(Restaurant $restaurant)
    {
        if ($restaurant->image) {
            Storage::disk('public')->delete($restaurant->image);
        }

        $restaurant->delete();

        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
