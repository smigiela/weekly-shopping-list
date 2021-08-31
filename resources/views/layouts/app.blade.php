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
                {{ $slot }}
            </main>
        </div>

        @livewireScripts
{{--    <script>--}}
{{--        // On page load or when changing themes, best to add inline in `head` to avoid FOUC--}}
{{--        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {--}}
{{--            document.documentElement.classList.add('dark')--}}
{{--        } else {--}}
{{--            document.documentElement.classList.remove('dark')--}}
{{--        }--}}

{{--        // Whenever the user explicitly chooses light mode--}}
{{--        localStorage.theme = 'light'--}}

{{--        // Whenever the user explicitly chooses dark mode--}}
{{--        localStorage.theme = 'dark'--}}

{{--        // Whenever the user explicitly chooses to respect the OS preference--}}
{{--        localStorage.removeItem('theme')--}}
{{--    </script>--}}
    </body>
</html>
