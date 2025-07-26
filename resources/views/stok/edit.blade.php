<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            ✏️ Edit Stok Barang
        </h2>
    </x-slot>

    <div class="mt-4 max-w-xl mx-auto bg-white p-6 rounded shadow">
        <form action="{{ route('stok.update', $barang->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-semibold mb-1">Nama Barang</label>
                <input type="text" value="{{ $barang->nama_barang }}" disabled class="w-full border rounded px-3 py-2 bg-gray-100">
            </div>

            <div class="mb-4">
                <label class="block font-semibold mb-1">Stok</label>
                <input type="number" name="stok" value="{{ old('stok', $barang->stok) }}" required class="w-full border rounded px-3 py-2">
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan Perubahan</button>
        </form>
    </div>
</x-app-layout>