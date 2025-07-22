<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            📤 Data Barang Keluar
        </h2>
    </x-slot>

    <div class="bg-white rounded shadow p-4 mt-4">
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Barang</th>
                    <th class="border px-4 py-2">Jumlah Keluar</th>
                    <th class="border px-4 py-2">Tanggal Keluar</th>
                    <th class="border px-4 py-2">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangKeluars as $keluar)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $keluar->barang->nama_barang }}</td>
                        <td class="border px-4 py-2">{{ $keluar->jumlah }}</td>
                        <td class="border px-4 py-2">{{ $keluar->tanggal_keluar }}</td>
                        <td class="border px-4 py-2">{{ $keluar->deskripsi }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-4">Belum ada data barang keluar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>