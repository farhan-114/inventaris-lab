<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">➕ Tambah Pengembalian Barang</h2>
    </x-slot>

    <form action="{{ route('pengembalian.store') }}" method="POST" class="space-y-4 mt-4">
        @csrf
        <div>
            <label class="block font-semibold">Pilih Barang</label>
            <select name="barang_id" class="w-full border rounded px-3 py-2" required>
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->nama_barang }} (Stok: {{ $barang->stok }})</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block font-semibold">Jumlah</label>
            <input type="number" name="jumlah" min="1" class="w-full border rounded px-3 py-2" required>
        </div>
        <div>
            <label class="block font-semibold">Deskripsi</label>
            <textarea name="deskripsi" class="w-full border rounded px-3 py-2"></textarea>
        </div>
        <div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('pengembalian.index') }}" class="ml-2 text-gray-600">Kembali</a>
        </div>
    </form>
</x-app-layout>