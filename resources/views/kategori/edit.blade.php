<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">Edit Kategori</h2>
    </x-slot>

    <div class="py-6 px-4">
        <form action="{{ route('kategori-barang.update', $kategori->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block">Nama Kategori</label>
                <input type="text" name="nama" value="{{ old('nama', $kategori->nama) }}" class="border rounded w-full" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
    </div>
</x-app-layout>