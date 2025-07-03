<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ➕ Tambah Barang Masuk
        </h2>
    </x-slot>

    <div class="py-6 max-w-3xl mx-auto px-4">
        <div class="bg-white p-6 shadow-md rounded">
            <form method="POST" action="{{ route('barang-masuk.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="nama_barang" class="block text-gray-700 font-medium mb-1">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-4">
                    <label for="jumlah" class="block text-gray-700 font-medium mb-1">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', 1) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="mb-6">
                    <label for="tanggal_masuk" class="block text-gray-700 font-medium mb-1">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" id="tanggal_masuk"
                        value="{{ old('tanggal_masuk', date('Y-m-d')) }}"
                        class="w-full border rounded px-3 py-2" required>
                </div>

                <div class="flex justify-between items-center">
                    <a href="{{ route('barang-masuk.index') }}" class="text-gray-600 hover:underline">← Kembali</a>
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        💾 Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>