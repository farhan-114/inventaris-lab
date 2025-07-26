<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">
            Dashboard Inventaris
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

            <!-- Card Barang -->
            <div class="bg-blue-500 text-white p-6 rounded-lg shadow-md text-center transform transition duration-300 hover:scale-105">
                <div class="text-4xl font-extrabold">{{ $jumlahBarang }}</div>
                <div class="mt-2 text-lg font-medium">📦 Stok Barang</div>
                <a href="{{ route('barang.index') }}"
                   class="inline-block mt-3 px-4 py-2 bg-white text-blue-600 font-semibold rounded hover:bg-blue-100 transition">
                    Lihat Detail
                </a>
            </div>

            <!-- Card Barang Masuk -->
            <div class="bg-orange-500 text-white p-6 rounded-lg shadow-md text-center transform transition duration-300 hover:scale-105">
                <div class="text-4xl font-extrabold">{{ $jumlahBarangMasuk }}</div>
                <div class="mt-2 text-lg font-medium">📥 Barang Masuk</div>
                <a href="{{ route('penerimaan.index') }}"
                   class="inline-block mt-3 px-4 py-2 bg-white text-orange-600 font-semibold rounded hover:bg-orange-100 transition">
                    Lihat Detail
                </a>
            </div>

            <!-- Card Stok -->
            <div class="bg-yellow-500 text-white p-6 rounded-lg shadow-md text-center transform transition duration-300 hover:scale-105">
                <div class="text-4xl font-extrabold">{{ $jumlahStok }}</div>
                <div class="mt-2 text-lg font-medium">📊 Stok</div>
                <a href="{{ route('stok.index') }}"
                   class="inline-block mt-3 px-4 py-2 bg-white text-yellow-600 font-semibold rounded hover:bg-yellow-100 transition">
                    Lihat Detail
                </a>
            </div>

            <!-- Card Peminjaman -->
            <div class="bg-green-500 text-white p-6 rounded-lg shadow-md text-center transform transition duration-300 hover:scale-105">
                <div class="text-4xl font-extrabold">{{ $jumlahPeminjaman }}</div>
                <div class="mt-2 text-lg font-medium">📤 Peminjaman</div>
                <a href="{{ route('peminjaman.index') }}"
                   class="inline-block mt-3 px-4 py-2 bg-white text-green-600 font-semibold rounded hover:bg-green-100 transition">
                    Lihat Detail
                </a>
            </div>

        </div>
    </div>
</x-app-layout>