@props(['header'])

<x-layouts.app>
    {{-- Teruskan slot header jika ada --}}
    <x-slot name="header">
        {{ $header ?? '' }}
    </x-slot>

    {{-- Ini penting agar konten halaman tampil --}}
    {{ $slot }}
</x-layouts.app>