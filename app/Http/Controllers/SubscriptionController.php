<?php

namespace App\Http\Controllers;

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
        $request->user()->newSubscription('premium', 'price_1JUn2bBwypJl1scHk9GteAlS')->create($request->token);

        return redirect()->route('subscription.show')->with('message', __('custom.global.messages.successfully_purchase'));    }
}
