<x-app-layout>
<<<<<<< HEAD
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Tambah Barang</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('barang.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block font-semibold">Nama Barang</label>
                <input type="text" name="nama_barang" class="w-full border rounded px-3 py-2" required value="{{ old('nama_barang') }}">
            </div>
            <div>
                <label class="block font-semibold">Satuan</label>
                <input type="text" name="satuan" class="w-full border rounded px-3 py-2" required value="{{ old('satuan', 'pcs') }}">
            </div>
            <div>
                <label class="block font-semibold">Rak</label>
                <select name="rak_id" class="w-full border rounded px-3 py-2">
                    <option value="">Pilih Rak</option>
                    @foreach($raks as $rak)
                        <option value="{{ $rak->id }}">{{ $rak->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Simpan</button>
            <a href="{{ route('barang.index') }}" class="ml-2 text-gray-600">Kembali</a>
        </form>
=======
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Tambah Barang</h2>
    </x-slot>

    <div class="py-6 px-4">
        <div class="bg-white p-6 rounded shadow max-w-xl">
            <form action="{{ route('barang.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="nama" class="block text-gray-700">Nama Barang</label>
                    <input type="text" name="nama" id="nama" class="w-full border-gray-300 rounded"
                        value="{{ old('nama') }}" required>
                </div>

                <div class="mb-4">
                    <label for="rak_id" class="block text-gray-700">Rak / Laci</label>
                    <select name="rak_id" id="rak_id" class="w-full border-gray-300 rounded">
                        <option value="">-- Pilih Rak --</option>
                        @foreach ($raks as $rak)
                            <option value="{{ $rak->id }}">{{ $rak->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
            </form>
        </div>
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
    </div>
</x-app-layout>