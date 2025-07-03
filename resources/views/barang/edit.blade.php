<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ✏️ Edit Barang
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto px-4">
        <div class="bg-white p-6 shadow-md rounded">
            <form method="POST" action="{{ route('barang.update', $barang->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="kode_barang" class="block text-gray-700 font-medium mb-1">Kode Barang</label>
                    <input type="text" name="kode_barang" id="kode_barang" value="{{ old('kode_barang', $barang->kode_barang) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="nama_barang" class="block text-gray-700 font-medium mb-1">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang', $barang->nama_barang) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="kategori" class="block text-gray-700 font-medium mb-1">Kategori</label>
                    <input type="text" name="kategori" id="kategori" value="{{ old('kategori', $barang->kategori) }}"
                        class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label for="stok" class="block text-gray-700 font-medium mb-1">Stok</label>
                    <input type="number" name="stok" id="stok" value="{{ old('stok', $barang->stok) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-6">
                    <label for="satuan" class="block text-gray-700 font-medium mb-1">Satuan</label>
                    <input type="text" name="satuan" id="satuan" value="{{ old('satuan', $barang->satuan) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('barang.index') }}" class="text-gray-600 hover:underline">← Kembali</a>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        💾 Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>