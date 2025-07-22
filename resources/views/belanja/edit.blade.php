<x-app-layout>
    <div class="bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Edit Belanja Barang</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('belanja.update', $belanja->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-semibold">Nama Barang</label>
                <input type="text" name="nama_barang" class="w-full border rounded px-3 py-2"
                    value="{{ old('nama_barang', $belanja->nama_barang) }}" required>
            </div>
            <div>
                <label class="block font-semibold">Jumlah</label>
                <input type="number" name="jumlah" class="w-full border rounded px-3 py-2"
                    value="{{ old('jumlah', $belanja->jumlah) }}" required>
            </div>
            <div>
                <label class="block font-semibold">Harga</label>
                <input type="number" step="0.01" name="harga" class="w-full border rounded px-3 py-2"
                    value="{{ old('harga', $belanja->harga) }}" required>
            </div>
            <div>
                <label class="block font-semibold">Tanggal</label>
                <input type="date" name="tanggal" class="w-full border rounded px-3 py-2"
                    value="{{ old('tanggal', $belanja->tanggal) }}" required>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                <a href="{{ route('belanja.index') }}" class="ml-2 text-gray-600">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>