<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">Daftar Barang</h2>
    </x-slot>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('barang.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Barang</a>

        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Kode</th>
                    <th class="border px-4 py-2">Nama</th>
                    <th class="border px-4 py-2">Satuan</th>
                    <th class="border px-4 py-2">Rak</th>
                    <th class="border px-4 py-2">Stok</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangs as $barang)
                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2">{{ $barang->kode_barang }}</td>
                        <td class="border px-4 py-2">{{ $barang->nama_barang }}</td>
                        <td class="border px-4 py-2">{{ $barang->satuan }}</td>
                        <td class="border px-4 py-2">{{ $barang->rak->nama ?? '-' }}</td>
                        <td class="border px-4 py-2">{{ $barang->stok }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('barang.edit', $barang->id) }}" class="text-blue-600">Edit</a> |
                            <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus barang ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Belum ada data barang.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="mt-4">
            {{ $barangs->links() }}
        </div>
</x-app-layout>
