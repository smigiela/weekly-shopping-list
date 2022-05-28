<?php

namespace App\Services;

class DashboardService
{
    /**
     * method to get a subscription end date
     * @return string
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function getNextPaymentDate($user)
    {
        $stripe = new \Stripe\StripeClient(
            config('services.stripe.STRIPE_SECRET')
        );

        $subscription = $stripe->subscriptions->retrieve(
            $user->subscriptions->first()->stripe_id,
            []
        );

        return date('d-m-Y', $subscription->current_period_end);
    }
}
