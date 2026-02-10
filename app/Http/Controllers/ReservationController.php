<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Slot;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'slot_id'       => 'required|exists:slots,id',
            'prsn_number'   => 'required|integer|min:1',
        ]);

        try {
            $reservation = DB::transaction(function () use ($validated) {
                $slot = Slot::where('id', $validated['slot_id'])
                    ->lockForUpdate()
                    ->firstOrFail();

                $remainingCapacity = $slot->capacity - $slot->booked_count;

                if ($validated['prsn_number'] > $remainingCapacity) {
                    throw new \Exception("Sorry, only {$remainingCapacity} seats left for this time slot.");
                }

                $slotDateTime = Carbon::parse($slot->start_time);

                $newReservation = Reservation::create([
                    'user_id'          => Auth::id(),
                    'restaurant_id'    => $validated['restaurant_id'],
                    'reservation_day'  => $slotDateTime->toDateString(),
                    'reservation_time' => $slotDateTime->toTimeString(),
                    'prsn_number'      => $validated['prsn_number'],
                    'status'           => 'pending',
                    'expires_at'       => now()->addMinutes(15),
                ]);

                $slot->increment('booked_count', $validated['prsn_number']);

                return $newReservation;
            });

            return redirect()->route('payment.index')
                ->with('reservation_id', $reservation->id)
                ->with('success', 'Your table is reserved for 15 minutes. Please complete your payment.');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function cancel(Reservation $reservation)
    {
        if ($reservation->status === 'pending') {
            DB::transaction(function () use ($reservation) {
                $slotStartTime = $reservation->reservation_day . ' ' . $reservation->reservation_time;
                $slot = Slot::where('start_time', $slotStartTime)->first();

                if ($slot) {
                    $slot->decrement('booked_count', $reservation->prsn_number);
                }

                $reservation->update(['status' => 'cancelled']);
            });
        }

        return redirect()->route('home')->with('info', 'Reservation has been cancelled.');
    }
}
