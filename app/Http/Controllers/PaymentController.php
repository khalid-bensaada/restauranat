<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Reservation;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Stripe\Webhook;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Start Stripe Checkout
     */
    public function checkout($reservationId)
    {
        $reservation = Reservation::findOrFail($reservationId);

        
        if ($reservation->payments()->where('status', 'paid')->exists()) {
            return back()->with('error', 'Reservation already paid.');
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        
        $payment = DB::transaction(function () use ($reservation) {

            return Payment::firstOrCreate(
                [
                    'reservation_id' => $reservation->id,
                    'status' => 'pending',
                ],
                [
                    'amount' => $reservation->total_price,
                    'currency' => 'mad',
                    'payment_method' => 'stripe',
                ]
            );
        });

        $session = Session::create([
            'payment_method_types' => ['card'],

            'line_items' => [[
                'price_data' => [
                    'currency' => 'mad',
                    'product_data' => [
                        'name' => 'Reservation #' . $reservation->id,
                    ],
                    
                    'unit_amount' => (int) ($payment->amount * 100),
                ],
                'quantity' => 1,
            ]],

            'mode' => 'payment',

            
            'success_url' => route('payments.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('payments.cancel'),

            'metadata' => [
                'payment_id' => $payment->id,
            ],
        ]);

        return redirect($session->url);
    }

    /**
     * Just a UI page — NOT proof of payment
     */
    public function success(Request $request)
    {
        return view('payments.success');
    }

    public function cancel()
    {
        return view('payments.cancel');
    }

    /**
     * Stripe Webhook (REAL payment confirmation)
     */
    public function webhook(Request $request)
    {
        $endpointSecret = config('services.stripe.webhook_secret');

        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sigHeader,
                $endpointSecret
            );
        } catch (\Exception $e) {
            return response()->json(['error' => 'Invalid webhook'], 400);
        }

        
        if ($event->type === 'checkout.session.completed') {

            $session = $event->data->object;
            $paymentId = $session->metadata->payment_id ?? null;

            if (!$paymentId) {
                return response()->json(['error' => 'Payment ID missing'], 400);
            }

            DB::transaction(function () use ($paymentId) {

                $payment = Payment::lockForUpdate()->find($paymentId);

                if (!$payment || $payment->status === 'paid') {
                    return;
                }

                $payment->update([
                    'status' => 'paid',
                    'paid_at' => now(),
                ]);

                $payment->reservation->update([
                    'status' => 'confirmed',
                ]);
            });
        }

        return response()->json(['success' => true]);
    }
}
