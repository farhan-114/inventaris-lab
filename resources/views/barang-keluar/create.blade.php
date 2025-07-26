<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">Tambah Barang Keluar</h2>
    </x-slot>

    <div class="bg-white p-6 rounded shadow mt-4">
        <form action="{{ route('barang-keluar.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium">Nama Barang</label>
                <select name="barang_id" class="w-full border rounded px-3 py-2">
                    <option value="">-- Pilih Barang --</option>
                    @foreach ($barangs as $barang)
                        <option value="{{ $barang->id }}">
                            {{ $barang->nama_barang }} (Stok: {{ $barang->stok }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium">Jumlah</label>
                <input type="number" name="jumlah" min="1" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-medium">Deskripsi</label>
                <textarea name="deskripsi" class="w-full border rounded px-3 py-2" required></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>