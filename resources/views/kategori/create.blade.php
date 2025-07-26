<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">Tambah Kategori</h2>
    </x-slot>

    <div class="py-6 px-4">
        <form action="{{ route('kategori-barang.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block">Nama Kategori</label>
                <input type="text" name="nama" class="border rounded w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>