<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('custom.subscription.checkout.header') }}
        </h2>
    </x-slot>
    <div class="mt-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 bg-white rounded-xl shadow-xl transition-all transform duration-500">
                <div class="mt-4">
                    @if(auth()->user()->subscribed('premium'))
                        <h1>Masz już premium plan :) Gratulujemy.</h1>
                    @else
                        <form id="payment-form" action="{{ route('subscription.purchase') }}" method="POST">
                            @csrf
                            <input type="hidden" name="plan" id="plan" value="premium">

                                <input type="text" name="name" id="card-holder-name"  class="mb-6 StripeElement" value=""
                                       placeholder="Name on the card">

                                <div id="card-element" class="mb-6"></div>

                            <button type="submit" class="text-lg block font-semibold py-2 px-6
                                                       text-white hover:text-green-100 bg-blue-400 rounded-lg
                                                           shadow hover:shadow-md transition duration-300" id="card-button"
                                        data-secret="{{ $intent->client_secret }}">Zapłać
                                </button>
                            </form>

                            <!-- button for checkout -->
                            {{--                            <hr>--}}
                        {{--                            <a href="https://buy.stripe.com/test_5kAg2s8y8avy0Xm4gg" class="text-lg block font-semibold py-2 px-6--}}
                        {{--                               text-white hover:text-green-100 bg-blue-400 rounded-lg--}}
                        {{--                               shadow hover:shadow-md transition duration-300">KUP</a>--}}
                    <!-- end of button -->
                    @endif
                </div>
            </div>
        </div>
    </div>
    @section('styles')
        <style>
            .StripeElement {
                box-sizing: border-box;
                height: 40px;
                padding: 10px 12px;
                border: 1px solid transparent;
                border-radius: 4px;
                background-color: white;
                box-shadow: 0 1px 3px 0 #e6ebf1;
                -webkit-transition: box-shadow 150ms ease;
                transition: box-shadow 150ms ease;
            }
            .StripeElement--focus {
                box-shadow: 0 1px 3px 0 #cfd7df;
            }
            .StripeElement--invalid {
                border-color: #fa755a;
            }
            .StripeElement--webkit-autofill {
                background-color: #fefde5 !important;
            }
        </style>
    @endsection
    @section('scripts')
        <script src="https://js.stripe.com/v3/"></script>
        <script>
            const stripe = Stripe('{{ config('cashier.key') }}')

            const elements = stripe.elements()
            const cardElement = elements.create('card')

            cardElement.mount('#card-element')

            const form = document.getElementById('payment-form')
            const cardBtn = document.getElementById('card-button')
            const cardHolderName = document.getElementById('card-holder-name')

            form.addEventListener('submit', async (e) => {
                e.preventDefault()

                cardBtn.disabled = true
                const {setupIntent, error} = await stripe.confirmCardSetup(
                    cardBtn.dataset.secret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: cardHolderName.value
                            }
                        }
                    }
                )

                if (error) {
                    cardBtn.disable = false
                } else {
                    let token = document.createElement('input')

                    token.setAttribute('type', 'hidden')
                    token.setAttribute('name', 'token')
                    token.setAttribute('value', setupIntent.payment_method)

                    form.appendChild(token)

                    form.submit();
                }
            })
        </script>
    @endsection
</x-app-layout>
