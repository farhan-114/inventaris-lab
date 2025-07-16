<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">✏️ Edit Barang QR</h2>
    </x-slot>

    <div class="py-6">
        <form action="{{ route('scanqr.update', $barang->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
            @method('PUT')
            @include('scanqr.form')
        </form>
    </div>
</x-app-layout>