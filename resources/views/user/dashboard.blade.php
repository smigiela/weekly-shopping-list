<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('custom.user_panel.header') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 2xl:grid-cols-3 px-8 gap-6 mt-6">
        <div class="col-span-1 bg-white px-8 py-6">
            <p class="text-xl font-semibold">{{__('custom.user_panel.next_subscription')}}:</p>

            {{ $next_payment ?? ''}}
        </div>
        <div class="col-span-1 bg-white px-8 py-6">
            <p class="text-xl font-semibold">{{__('custom.user_panel.affiliate_saldo')}}</p>
            <p class="text-xs">(w przygotowaniu)</p>
        </div>
        <div class="col-span-1 bg-white px-8 py-6">
            <p class="text-xl font-semibold">{{__('custom.user_panel.messages')}}</p>
            <p class="text-xs">(w przygotowaniu)</p>
        </div>
    </div>

    <div class="w-full p-8 mt-10">
        {{__('custom.user_panel.referral_link')}} <p class="text-xs">(w przygotowaniu)</p>
    </div>

    <div class="w-full p-8 mt-10 text-xl">
        <div class="grid grid-cols-1 lg:grid-cols-5">
            <div class="col-span-1">{{__('custom.user_panel.username')}}</div> <div class="col-span-3">{{ $user->name }}</div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 mt-10">
            <div class="col-span-1">{{__('custom.user_panel.status')}}</div> <div class="col-span-3">
                @if($user->status == 'disabled')
                    {{__('custom.user_panel.disabled')}} <br><br>
                @else
                    {{__('custom.user_panel.enabled')}} <br><br>
                @endif
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 mt-10">
            <div class="col-span-1">{{__('custom.user_panel.earned')}}</div> <div class="col-span-3">
                <p class="text-xs">(w przygotowaniu)</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-5 mt-10">
            <div class="col-span-1">{{__('custom.user_panel.amount_affiliates')}}</div> <div class="col-span-3">
                <p class="text-xs">(w przygotowaniu)</p>
            </div>
        </div>



    </div>
</x-app-layout>
