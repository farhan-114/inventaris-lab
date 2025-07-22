<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Font Awesome (optional) --}}
    <script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="font-sans antialiased bg-gray-100">

    <div class="min-h-screen flex">

        {{-- ✅ Sidebar --}}
        @include('layouts.sidebar')

        {{-- ✅ Content Area --}}
        <div class="flex-1 flex flex-col">
            <header class="bg-blue-700 shadow">
                <div class="py-6 px-6 text-xl font-semibold">
                    {{ $header ?? '' }}
                </div>
            </header>

            <main class="flex-1 py-6 px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>

    </div>

    @stack('scripts')
</body>
</html>