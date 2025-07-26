<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Edit Data Peminjaman
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Nama Barang --}}
                    <div class="mb-4">
                        <label for="barang_id" class="block font-medium text-sm text-gray-700">Nama Barang</label>
                        <select name="barang_id" class="form-select mt-1 block w-full" required>
                            @foreach ($barangs as $barang)
                                <option value="{{ $barang->id }}" {{ $barang->id == $peminjaman->barang_id ? 'selected' : '' }}>
                                    {{ $barang->nama_barang }} ({{ $barang->stok }} {{ $barang->satuan }})
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- Jumlah Dipinjam --}}
                    <div class="mb-4">
                        <label for="jumlah" class="block font-medium text-sm text-gray-700">Jumlah</label>
                        <input type="number" name="jumlah" class="form-input mt-1 block w-full" required value="{{ $peminjaman->jumlah }}">
                    </div>

                    {{-- Ruangan --}}
                    <div class="mb-4">
                        <label for="ruangan" class="block font-medium text-sm text-gray-700">Ruangan</label>
                        <input type="text" name="ruangan" class="form-input mt-1 block w-full" required value="{{ $peminjaman->ruangan }}">
                    </div>

                    {{-- Keterangan --}}
                    <div class="mb-4">
                        <label for="keterangan" class="block font-medium text-sm text-gray-700">Keterangan</label>
                        <textarea name="keterangan" class="form-input mt-1 block w-full">{{ $peminjaman->keterangan }}</textarea>
                    </div>

                    {{-- Tombol Simpan --}}
                    <div>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                            Update
                        </button>
                        <a href="{{ route('peminjaman.index') }}" class="ml-2 text-gray-600">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>