<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Weekly Shopping APP') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @yield('styles')

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @include('partials.message')
                <!-- back button -->
                    <div class="relative inline-flex hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                        <a href="javascript:history.back()" class="mt-3 text-lg block font-semibold py-2 px-2
                                        text-white hover:text-green-100 bg-green-200 rounded-lg
                                        shadow hover:shadow-md transition duration-300">{{__('custom.global.back')}}</a>
                    </div>
                {{ $slot }}
            </main>
        </div>

        @livewireScripts
        @yield('scripts')
    </body>
</html>
