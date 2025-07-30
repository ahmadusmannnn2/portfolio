<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Ahmad Usman | Portfolio') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-theme-light">
            <div class="w-full sm:max-w-4xl mt-6 bg-white shadow-md overflow-hidden sm:rounded-lg grid grid-cols-1 md:grid-cols-2">
                <div class="p-6 md:p-10">
                    {{ $slot }}
                </div>

                <div class="hidden md:block bg-theme-secondary p-10 flex flex-col justify-center items-center text-center">
                    <a href="/">
                        <h1 class="text-4xl font-bold text-theme-main">Ahmad Usman</h1>
                        <p class="text-theme-text mt-2">UI/UX Designer & Developer</p>
                    </a>
                    <img src="{{ asset('images/home.png') }}" alt="Branding" class="mt-8 w-full max-w-xs mx-auto">
                </div>
            </div>
        </div>
    </body>
</html>