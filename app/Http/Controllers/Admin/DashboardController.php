<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stripe = new \Stripe\StripeClient(config('services.stripe.STRIPE_SECRET'));
        $balance = $stripe->balance->retrieve();
        collect($balance)->groupBy('currency');
        $balance = ($balance['available']['0']->amount)/100;

        $subscribers = User::has('subscriptions')->paginate(10);

        $freeUsers = User::has('subscriptions', 0)->paginate(10);

        return view('admin.dashboard', compact('balance', 'subscribers', 'freeUsers'));
    }
}
