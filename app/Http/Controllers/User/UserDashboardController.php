<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    /**
     * TODO: Naprawić dashboard dla usera bez subskrypcji
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function index()
    {
        $user = auth()->user();
        $user->load('subscriptions');

        if ($user->subscriptions->first() == null)
            return view('user.dashboard', compact('user'));
        else
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
