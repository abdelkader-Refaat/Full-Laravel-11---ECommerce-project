<?php

namespace App\Http\Controllers;

use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;

class PaypalController extends Controller
{
    public function processPaypal(Request $request)
    {
        $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('success'),
                    "cancel_url" => route('cancel'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => "100.00"  // $request->price
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {

                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }

                return redirect()
                    ->route('cart.show')
                    ->with('error', 'Something went wrong with paypal.');

            } else {
                return redirect()
                    ->route('cart.show')
                    ->with('error', $response['message'] ?? 'Something went wrong with paypal.');
            }
    }


    public function processSuccess(Request $request)
    {

            $provider = new PayPalClient;
            $provider->setApiCredentials(config('paypal'));
            $provider->getAccessToken();
            $response = $provider->capturePaymentOrder($request['token']);

            if (isset($response['status']) && $response['status'] == 'COMPLETED') {
                return redirect()
                    ->route('cart.show')
                    ->with('success', 'Transaction complete.');
            } else {
                return redirect()
                    ->route('cart.show')
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }

    }

     public function processCancel(Request $request)
        {
            return redirect()
                ->route('processPaypal')
                ->with('error','You have canceled the transaction.');
        }
}
