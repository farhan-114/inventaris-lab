<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            📊 Laporan Barang
        </h2>
    </x-slot>

    <div class="bg-white p-4 rounded shadow mt-4">
        <form method="GET" class="mb-4 flex flex-wrap gap-2 items-center">
            <label class="font-semibold">Tanggal Awal</label>
            <input type="date" name="tanggal_awal" value="{{ request('tanggal_awal') }}" class="border rounded px-2 py-1">

            <label class="font-semibold">Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" value="{{ request('tanggal_akhir') }}" class="border rounded px-2 py-1">

            <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded">Filter</button>
            <a href="{{ route('laporan.index') }}" class="ml-2 text-gray-600">Reset</a>
        </form>

        <div class="flex justify-between items-center mb-2">
            <h3 class="font-bold text-lg">📥 Barang Masuk</h3>
            <a href="{{ route('laporan.export-pdf-masuk') }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                📄 Export PDF
            </a>
        </div>
        <table class="w-full border mb-6">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Barang</th>
                    <th class="border px-4 py-2">Jumlah Masuk</th>
                    <th class="border px-4 py-2">Tanggal Masuk</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangMasuk as $masuk)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $masuk->nama_barang }}</td>
                        <td class="border px-4 py-2">{{ $masuk->jumlah }}</td>
                        <td class="border px-4 py-2">{{ $masuk->created_at }}</td>
                    </tr>
                @empty
                    <tr><td colspan="4" class="text-center py-2">Tidak ada data barang masuk.</td></tr>
                @endforelse
            </tbody>
        </table>

        <div class="flex justify-between items-center mb-2">
            <h3 class="font-bold text-lg">📤 Barang Keluar</h3>
            <a href="{{ route('laporan.export-pdf-keluar') }}" class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700">
                📄 Export PDF
            </a>
        </div>
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
                @forelse ($barangKeluar as $keluar)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $keluar->barang->nama_barang ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $keluar->jumlah }}</td>
                        <td class="border px-4 py-2">{{ $keluar->tanggal_keluar }}</td>
                        <td class="border px-4 py-2">{{ $keluar->deskripsi }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-2">Tidak ada data barang keluar.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
