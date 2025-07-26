<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100">
    <div class="min-h-screen flex flex-col">
        {{-- Slot header --}}
        @isset($header)
        <header class="bg-blue-700 shadow text-white">
            <div class="py-6 px-6 text-xl font-semibold">
                {{ $header }}
            </div>
        </header>
        @endisset

        {{-- Slot utama --}}
        <main class="flex-1 py-6 px-4 sm:px-6 lg:px-8">
            {{ $slot }}
        </main>
    </div>
</body>
</html>