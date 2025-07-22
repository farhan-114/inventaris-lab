<x-app-layout>
    <div class="p-6">
        <h1 class="text-xl font-bold mb-4">Edit Barang</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('barang.update', $barang->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <div>
                <label class="block font-semibold">Nama Barang</label>
                <input type="text" name="nama_barang" class="w-full border rounded px-3 py-2" required value="{{ old('nama_barang', $barang->nama_barang) }}">
            </div>
            <div>
                <label class="block font-semibold">Satuan</label>
                <input type="text" name="satuan" class="w-full border rounded px-3 py-2" required value="{{ old('satuan', $barang->satuan) }}">
            </div>
            <div>
                <label class="block font-semibold">Rak</label>
                <select name="rak_id" class="w-full border rounded px-3 py-2">
                    <option value="">Pilih Rak</option>
                    @foreach($raks as $rak)
                        <option value="{{ $rak->id }}" {{ $rak->id == $barang->rak_id ? 'selected' : '' }}>{{ $rak->nama }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
            <a href="{{ route('barang.index') }}" class="ml-2 text-gray-600">Kembali</a>
        </form>
    </div>
</x-app-layout>