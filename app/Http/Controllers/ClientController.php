<?php

// app/Http/Controllers/AvailabilityController.php
namespace App\Http\Controllers;

use App\Models\Availability;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function store(Request $request, $restaurantId)
    {
        $request->validate([
            'date' => 'required|date',
            'start_time' => 'required',
            'capacity' => 'required|integer|min:1',
        ]);

        Availability::create([
            'restaurant_id' => $restaurantId,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'capacity' => $request->capacity,
        ]);

        return back()->with('success', 'Availability added successfully!');
    }
}
