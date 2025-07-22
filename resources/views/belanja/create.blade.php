<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            ➕ Tambah Belanja Barang
        </h2>
    </x-slot>

        <form action="{{ route('belanja.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block font-semibold">Nama Barang</label>
                <input type="text" name="nama_barang" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-semibold">Jumlah</label>
                <input type="number" name="jumlah" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-semibold">Harga</label>
                <input type="number" step="0.01" name="harga" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                <a href="{{ route('belanja.index') }}" class="ml-2 text-gray-600">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>