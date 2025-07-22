<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">🔄 Data Pengembalian Barang</h2>
    </x-slot>

    <div class="mt-4 text-right">
        <a href="{{ route('pengembalian.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">+ Pengembalian</a>
    </div>

    <div class="bg-white rounded shadow p-4 mt-4">
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Barang</th>
                    <th class="border px-4 py-2">Jumlah</th>
                    <th class="border px-4 py-2">Tanggal Pengembalian</th>
                    <th class="border px-4 py-2">Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pengembalians as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $item->barang->nama_barang }}</td>
                        <td class="border px-4 py-2">{{ $item->jumlah }}</td>
                        <td class="border px-4 py-2">{{ $item->tanggal_pengembalian }}</td>
                        <td class="border px-4 py-2">{{ $item->deskripsi }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-4">Belum ada data pengembalian.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>