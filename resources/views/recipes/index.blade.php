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
                        <h1>Tu będzie moduł do zarządzania przepisami :)</h1>
                    @else
                        Aby korzystać z przepisów przejdź na wersję premium: <a href="{{route('subscription.show')}}">TUTAJ</a>
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
