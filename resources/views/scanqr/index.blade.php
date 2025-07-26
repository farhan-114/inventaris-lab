<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">📷 Scan QR</h2>
    </x-slot>

    <div class="py-6">
        <div class="mb-4 text-right">
            <a href="{{ route('scanqr.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Tambah Barang</a>
        </div>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded shadow p-4">
            <table class="w-full table-auto">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2">No</th>
                        <th class="px-4 py-2">Nama Barang</th>
                        <th class="px-4 py-2">Kode QR</th>
                        <th class="px-4 py-2">Rak</th>
                        <th class="px-4 py-2">Stok</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barangs as $barang)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $barang->nama_barang }}</td>
                            <td class="border px-4 py-2">{{ $barang->kode_qr }}</td>
                            <td class="border px-4 py-2">{{ $barang->rak->nama ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $barang->stok }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('scanqr.edit', $barang->id) }}" class="text-blue-600 hover:underline">Edit</a> |
                                <form action="{{ route('scanqr.destroy', $barang->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="text-center text-gray-500">Data kosong</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>