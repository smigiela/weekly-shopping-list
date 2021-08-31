<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__('custom.global.dashboard')}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
               <div class="py-8 px-8">
                   <p>Tu będzie panel dla zalogowanego użytkownika - strona główna, którą zobaczy każdy zalogowany.</p>

                   <p>może być inna treść dla subskrybenta, inna dla free użytkownika a jeszcze inna dla użytkownika z prawami admina :) nie ma problemu :)</p>
               </div>
            </div>
        </div>
    </div>
</x-app-layout>
