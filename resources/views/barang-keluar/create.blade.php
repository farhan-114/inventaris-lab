<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Tambah Barang Keluar
        </h2>
    </x-slot>

    <div class="bg-white p-6 rounded shadow">
        <form action="{{ route('barang-keluar.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block font-medium">Nama Barang</label>
                <select name="barang_id" class="w-full border rounded p-2">
                    <option value="">-- Pilih Barang --</option>
                    @foreach ($barangs as $barang)
                        <option value="{{ $barang->id }}">{{ $barang->nama_barang }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium">Jumlah</label>
                <input type="number" name="jumlah" class="w-full border rounded p-2" required>
            </div>

            <div>
                <label class="block font-medium">Keterangan</label>
                <textarea name="keterangan" class="w-full border rounded p-2"></textarea>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
        </form>
    </div>
</x-app-layout>