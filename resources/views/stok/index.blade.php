<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            📦 Data Stok Barang
        </h2>
    </x-slot>

    <div class="mt-4">
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded shadow p-4">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Kode Barang</th>
                        <th class="border px-4 py-2">Nama Barang</th>
                        <th class="border px-4 py-2">Kategori</th>
                        <th class="border px-4 py-2">Stok</th>
                        <th class="border px-4 py-2">Satuan</th>
                        <th class="border px-4 py-2">Rak</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $barang)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $barang->kode_barang }}</td>
                            <td class="border px-4 py-2">{{ $barang->nama_barang }}</td>
                            <td class="border px-4 py-2">{{ $barang->kategori ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $barang->stok }}</td>
                            <td class="border px-4 py-2">{{ $barang->satuan }}</td>
                            <td class="border px-4 py-2">{{ $barang->rak->nama ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">Belum ada data stok barang.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
