<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-800 leading-tight">
            📊 Dashboard Inventaris
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-700 mb-2">Total Barang</h3>
                    <div class="text-3xl font-bold text-blue-600">{{ $jumlahBarang }}</div>
                </div>
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-700 mb-2">Barang Masuk</h3>
                    <div class="text-3xl font-bold text-green-600">{{ $jumlahBarangMasuk }}</div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
