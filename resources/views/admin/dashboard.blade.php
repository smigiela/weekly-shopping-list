<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('custom.admin_panel.header') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 2xl:grid-cols-3 px-8 gap-6 mt-6">
        <div class="col-span-1 bg-white px-8 py-6">
            <p>saldo:</p>
            <p>{{ $balance }} PLN</p>
        </div>
        <div class="col-span-1 bg-white px-8 py-6">
            <p>saldo programu partnerskiego</p>
        </div>
        <div class="col-span-1 bg-white px-8 py-6">
            <p>Wiadomości</p>
            <button class="bg-gray-600 text-white py-2 px-2">Dodaj</button>
        </div>
    </div>
</x-app-layout>
