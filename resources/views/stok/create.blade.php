<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">Tambah Stok Barang</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded p-6">

                @if($errors->any())
                    <div class="mb-4 p-2 bg-red-100 text-red-700 rounded">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="{{ route('stok.store') }}" method="POST" class="space-y-4">
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
                        <a href="{{ route('stok.index') }}" class="ml-2 text-gray-600">Kembali</a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>