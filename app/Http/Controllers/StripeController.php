<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public $stripe ;
    public function __construct() {
    $this->stripe = new \Stripe\StripeClient(
        config('stripe.api_key.secret')
    );
    }

    public function ShowCheckoutForm()
    {
        return view('stripe.chechout');
    }

    function pay()  {
        $session = $this->stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'EGP',
                    'product_data' => [
                        'name' => 'T-Shirt',
                    ],
                    'unit_amount' => 5000, // price * 100
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => 'http://localhost:4242/success',
            'cancel_url' => 'http://localhost:4242/cancel',
        ]);
        return redirect($session->url);
    }
}
