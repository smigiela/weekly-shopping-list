<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $user->load('subscriptions');

        $stripe = new \Stripe\StripeClient(
            config('services.stripe.STRIPE_SECRET')
        );
        $subscription = $stripe->subscriptions->retrieve(
            $user->subscriptions->first()->stripe_id,
            []
        );

        $next_payment = date('d-m-Y', $subscription->current_period_end);

        return view('user.dashboard', compact('user', 'next_payment'));
    }
}
