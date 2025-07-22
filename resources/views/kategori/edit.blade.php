<x-app-layout>
    <x-slot name="header">
        <h1 class="text-xl font-bold">Edit Kategori</h1>
    </x-slot>

    <div class="bg-white p-6 rounded shadow">
        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('kategori-barang.update', $kategori->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-semibold">Nama Kategori</label>
                <input type="text" name="nama" class="w-full border rounded px-3 py-2" value="{{ old('nama', $kategori->nama) }}" required>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                <a href="{{ route('kategori-barang.index') }}" class="ml-2 text-gray-600">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>