<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Show form to purchase subscription
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View]
     */
    public function show()
    {
        $intent = auth()->user()->createSetupIntent();

        return view('subscription.checkout', compact('intent'));
    }

    public function purchase(Request $request, int $price = 1500)
    {
        $subscription = $request->user()->newSubscription('premium', config('services.stripe.premium_price'))->skipTrial()->create($request->token);

        $subscription->update(['ends_at' => Carbon::now()->addMonth(1)]);
        auth()->user()->update(['trial_ends_at' => now()]);

        return redirect()->route('subscription.show')->with('message', __('custom.global.messages.successfully_purchase'));    }
}
