<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans h-screen text-gray-900 antialiased bg-gray-100">
        <div class="conatiner mx-auto px-md:px-6 flex flex-col h-[inherit]">
            <header class="mb-auto h-20 bg-white">
                <div class="conatiner mx-auto px-4 md:px-6 h-[inherit] flex items-center justify-between">
                    <a href="{{ route('frontend.home') }}">
                        <img src="{{ asset('frontend/img/logo-amdd.png') }}" alt="logo" class="h-10">
                    </a>
                </div>
            </header>
            <main>
                <div class="conatiner mx-auto px-4 md:px-6">
                    <div class="w-full max-w-[480px] px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg mx-auto">
                        {{ $slot }}
                    </div>
                </div>
            </main>
            <footer class="mt-auto bg-white border-t border-gray-300 p-4 text-center">
                <p>© 2025 AMDD. All Rights Reserved.</p>
            </footer>
        </div>
    </body>
</html>
