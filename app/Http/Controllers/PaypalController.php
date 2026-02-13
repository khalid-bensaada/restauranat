<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Reservation;

class PayPalController extends Controller
{

    public function createPayment($id)
    {

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "5.00"
                    ]
                ]
            ],
            "application_context" => [
                "return_url" => route('paypal.success', ['reservation_id' => $id]),
                "cancel_url" => route('paypal.cancel'),
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            // Redirect user to PayPal
            foreach ($response['links'] as $link) {
                if ($link['rel'] == 'approve') {
                    return redirect()->away($link['href']);
                }
            }
            return redirect()->route('paypal.cancel');
        } else {
            return redirect()->route('paypal.cancel');
        }
    }

    public function success(Request $request)
    {
        $orderID = $request->query('token');
        if (!$orderID) {
            return redirect()->route('client.myreserve')
                ->with('error', 'PayPal order ID missing.');
        }

        $provider = new \Srmklive\PayPal\Services\PayPal;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($orderID);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {

            return view('payments.success', compact('response'));
        }

        return view('payments.cancel', compact('response'));
    }


    public function cancel($id)
    {
        $reservation = Reservation::findOrFail($id);

        $reservation->status = 'cancelled';
        $reservation->save();

        return redirect()->route('client.myreserve')
            ->with('error', 'Reservation has been cancelled.');
    }
}
