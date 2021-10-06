<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentProcessorController extends Controller
{
    public function getBalance()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $balance = $stripe->balance->retrieve();
        collect($balance)->groupBy('currency');
        $balance = ($balance['available']['0']->amount)/100;

        return $balance;
    }
}
