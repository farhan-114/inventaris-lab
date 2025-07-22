<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            ➕ Tambah Penerimaan Barang
        </h2>
    </x-slot>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-2 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('penerimaan.store') }}" method="POST" class="space-y-4 p-4 bg-white shadow rounded">
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
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('penerimaan.index') }}" class="ml-2 text-gray-600">Kembali</a>
        </div>
    </form>
</x-app-layout>