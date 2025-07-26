<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">
            ➕ Tambah Belanja
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded shadow-md">
            <form action="{{ route('belanja.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="nama_barang" class="block font-semibold">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" value="{{ old('nama_barang') }}"
                        class="w-full border rounded px-3 py-2" required>
                    @error('nama_barang')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="jumlah" class="block font-semibold">Jumlah</label>
                    <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}"
                        class="w-full border rounded px-3 py-2" required min="1">
                    @error('jumlah')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="harga" class="block font-semibold">Harga</label>
                    <input type="number" name="harga" id="harga" value="{{ old('harga') }}"
                        class="w-full border rounded px-3 py-2" required min="0">
                    @error('harga')
                        <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="total" class="block font-semibold">Total</label>
                    <input type="text" id="total" class="w-full border rounded px-3 py-2 bg-gray-100" readonly>
                </div>
                
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
                <a href="{{ route('belanja.index') }}" class="ml-2 text-gray-600 hover:underline">Kembali</a>
            </form>
        </div>
    </div>
</x-app-layout> 
    <script>
    const jumlah = document.getElementById('jumlah');
    const harga = document.getElementById('harga');
    const total = document.getElementById('total');

    function updateTotal() {
        const j = parseInt(jumlah.value) || 0;
        const h = parseInt(harga.value) || 0;
        total.value = 'Rp ' + (j * h).toLocaleString('id-ID');
    }

    jumlah.addEventListener('input', updateTotal);
    harga.addEventListener('input', updateTotal);
    </script>