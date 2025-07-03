<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            📦 Inventaris Barang
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            {{-- Flash Message --}}
            @if (session('success'))
                <div class="p-4 bg-green-100 border border-green-400 text-green-800 rounded shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between items-center mb-4">
            {{-- Filter & Tambah --}}
           <form action="{{ route('barang-masuk.index') }}" method="GET" class="flex items-center space-x-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama barang..."
            class="border px-4 py-2 rounded w-64" />
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            🔍 Cari
        </button>
    </form> 

                <a href="{{ route('barang.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    ➕ Tambah Barang
                </a>
            </div>

            {{-- Tabel Data --}}
            <div class="bg-white shadow rounded overflow-x-auto">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-2 border">No</th>
                            <th class="px-4 py-2 border">Kode</th>
                            <th class="px-4 py-2 border">Nama</th>
                            <th class="px-4 py-2 border">Kategori</th>
                            <th class="px-4 py-2 border">Stok</th>
                            <th class="px-4 py-2 border">Satuan</th>
                            <th class="px-4 py-2 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800">
                        @forelse ($barangs as $barang)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 border text-center">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2 border">{{ $barang->kode_barang }}</td>
                                <td class="px-4 py-2 border">{{ $barang->nama_barang }}</td>
                                <td class="px-4 py-2 border">{{ $barang->kategori }}</td>
                                <td class="px-4 py-2 border text-center">{{ $barang->stok }}</td>
                                <td class="px-4 py-2 border">{{ $barang->satuan }}</td>
                                <td class="px-4 py-2 border text-center space-x-2">
                                    <a href="{{ route('barang.edit', $barang->id) }}" class="text-blue-600 hover:underline">✏️ Edit</a>
                                    <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin hapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="text-red-600 hover:underline">🗑️ Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-gray-500 py-4">Belum ada data barang.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>