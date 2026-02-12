<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Reservation;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Webhook;

class PaymentController extends Controller
{
    /**
     * Initiate Stripe Checkout
     */
    public function checkout($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);

        
        if ($reservation->payments()->where('status', 'paid')->exists()) {
            return back()->with('error', 'Reservation already paid.');
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        
        $payment = Payment::create([
            'reservation_id' => $reservation->id,
            'amount' => $reservation->total_price,
            'currency' => 'MAD',
            'payment_method' => 'stripe',
            'status' => 'pending',
        ]);

    
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => 'Reservation #' . $reservation->id,
                    ],
                    'unit_amount' => $payment->amount * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payments.success'),
            'cancel_url' => route('payments.cancel'),
            'metadata' => [
                'payment_id' => $payment->id
            ],
        ]);

        return redirect($session->url);
    }

    /**
     * Success page
     */
    public function success()
    {
        return view('payments.success')
    }

    /**
     * Cancel page
     */
    public function cancel()
    {
        return view('payments.cancel');
    }

    /**
     * Stripe Webhook to update payment status
     */
    public function webhook(Request $request)
    {
        $endpointSecret = env('STRIPE_WEBHOOK_SECRET');

        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid payload'], 400);
        }

        if ($event->type === 'checkout.session.completed') {
            $session = $event->data->object;
            $paymentId = $session->metadata->payment_id ?? null;

            if ($paymentId) {
                $payment = Payment::find($paymentId);

                if ($payment && $payment->status !== 'paid') {
                    $payment->update([
                        'status' => 'paid',
                        'paid_at' => now(),
                    ]);

                
                    $payment->reservation->update([
                        'status' => 'confirmed'
                    ]);
                }
            }
        }

        return response()->json(['success' => true]);
    }
}
