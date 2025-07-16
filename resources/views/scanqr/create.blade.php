<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">+ Tambah Barang dari QR</h2>
    </x-slot>

    <div class="py-6">
        <form action="{{ route('scanqr.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
            @include('scanqr.form')
        </form>
    </div>
</x-app-layout>