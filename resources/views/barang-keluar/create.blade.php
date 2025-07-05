@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-semibold mb-4">Tambah Barang Keluar</h2>

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
@endsection