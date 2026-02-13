<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Availability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'availability_id' => 'required|exists:availabilities,id',
            'prsn_number'     => 'required|integer|min:1',
        ]);


        $availability = Availability::findOrFail($validated['availability_id']);


        if ($availability->capacity < $validated['prsn_number']) {
            return back()->with('error', 'Not enough seats available.');
        }


        $reservation = Reservation::create([
            'user_id'          => Auth::id(),
            'restaurant_id'    => $availability->restaurant_id,
            'reservation_day'  => $availability->date,
            'reservation_time' => $availability->start_time,
            'prsn_number'      => $validated['prsn_number'],
            'status'           => 'pending',
        ]);


        $availability->decrement('capacity', $validated['prsn_number']);

        return redirect()->route('client.index')
            ->with('success', 'Reservation created successfully!');
    }
    public function create($restaurantId)
    {
        $restaurant = \App\Models\Restaurant::findOrFail($restaurantId);

        $availabilities = \App\Models\Availability::where('restaurant_id', $restaurantId)
            ->where('date', '>=', now()->format('Y-m-d'))
            ->orderBy('date')
            ->orderBy('start_time')
            ->get();

        return view('client.reservation', compact('restaurant', 'availabilities'));
    }


    public function cancel(Reservation $reservation)
    {

        if ($reservation->user_id !== Auth::id()) {
            abort(403);
        }


        $availability = Availability::where('restaurant_id', $reservation->restaurant_id)
            ->where('date', $reservation->reservation_day)
            ->where('start_time', $reservation->reservation_time)
            ->first();

        if ($availability) {
            $availability->increment('capacity', $reservation->prsn_number);
        }


        $reservation->update([
            'status' => 'cancelled'
        ]);

        return redirect()->route('client.index')
            ->with('info', 'Reservation cancelled.');
    }
    public function myReservations()
    {
        
        $reservations = Reservation::with('restaurant')
            ->where('user_id', auth()->id())
            ->latest()
            ->paginate(9);

        return view('client.myreserve', compact('reservations'));
    }
}
