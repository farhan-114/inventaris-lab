<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">
            Barang Keluar
        </h2>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4 text-right">
            <a href="{{ route('barang-keluar.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Barang Keluar
            </a>
        </div>

        <div class="bg-white rounded shadow p-4">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama Barang</th>
                        <th class="border px-4 py-2">Jumlah</th>
                        <th class="border px-4 py-2">Keterangan</th>
                        <th class="border px-4 py-2">Tanggal</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangKeluars as $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $item->barang->nama_barang }}</td>
                            <td class="border px-4 py-2">{{ $item->jumlah }}</td>
                            <td class="border px-4 py-2">{{ $item->keterangan ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $item->created_at->format('d-m-Y') }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('barang-keluar.edit', $item->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                |
                                <form action="{{ route('barang-keluar.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data barang keluar.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>