<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Barang</h2>
    </x-slot>

    <div class="py-6 px-4">
        <div class="bg-white p-6 rounded shadow max-w-xl">
            <form action="{{ route('barang.update', $barang->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="nama" class="block text-gray-700">Nama Barang</label>
                    <input type="text" name="nama" id="nama" class="w-full border-gray-300 rounded"
                        value="{{ old('nama', $barang->nama) }}" required>
                </div>

                <div class="mb-4">
                    <label for="rak_id" class="block text-gray-700">Rak / Laci</label>
                    <select name="rak_id" id="rak_id" class="w-full border-gray-300 rounded">
                        <option value="">-- Pilih Rak --</option>
                        @foreach ($raks as $rak)
                            <option value="{{ $rak->id }}" {{ $barang->rak_id == $rak->id ? 'selected' : '' }}>
                                {{ $rak->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Perbarui</button>
            </form>
        </div>
    </div>
</x-app-layout>