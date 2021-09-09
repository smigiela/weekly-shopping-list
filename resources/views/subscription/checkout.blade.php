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
                    <form id="payment-form" action="{{ route('subscription.purchase') }}" method="POST">
                        @csrf
                        <input type="hidden" name="plan" id="plan" value="'premium'">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="Name on the card">
                        </div>
                        <div class="form-group">
                            <label for="">Card details</label>
                            <div id="card-element"></div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100" id="card-button" data-secret="{{ $intent->client_secret }}">Pay</button>
                    </form>

                        <!-- button for checkout -->
                            <hr>
                            <a href="https://buy.stripe.com/test_5kAg2s8y8avy0Xm4gg" class="text-lg block font-semibold py-2 px-6
                               text-white hover:text-green-100 bg-blue-400 rounded-lg
                               shadow hover:shadow-md transition duration-300">KUP</a>
                        <!-- end of button -->

                </div>
            </div>
        </div>
    </div>
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
                const { setupIntent, error } = await stripe.confirmCardSetup(
                    cardBtn.dataset.secret, {
                        payment_method: {
                            card: cardElement,
                            billing_details: {
                                name: cardHolderName.value
                            }
                        }
                    }
                )

                if(error) {
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
