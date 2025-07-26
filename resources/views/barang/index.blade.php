<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">Daftar Barang</h2>
    </x-slot>

<<<<<<< HEAD
    <div class="py-6 px-4">
        <div class="mb-4 flex justify-between items-center">
            <a href="{{ route('barang.create') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded">+ Tambah Barang</a>
        </div>

        <!-- 🔍 Form Filter -->
        <form method="GET" action="{{ route('barang.index') }}" class="mb-4 flex flex-wrap gap-2">
            <input type="text" name="cari" value="{{ request('cari') }}"
                placeholder="Cari nama barang..."
                class="border rounded px-3 py-2 w-60">

            <select name="rak_id" class="border rounded px-3 py-2 w-60">
                <option value="">-- Filter Rak / Laci --</option>
                @foreach ($raks as $rak)
                    <option value="{{ $rak->id }}" {{ request('rak_id') == $rak->id ? 'selected' : '' }}>
                        {{ $rak->nama }}
                    </option>
                @endforeach
            </select>

            <button type="submit"
                class="bg-gray-700 text-white px-4 py-2 rounded">🔍 Filter</button>

            @if (request('cari') || request('rak_id'))
                <a href="{{ route('barang.index') }}"
                    class="text-sm text-red-600 underline">Reset</a>
            @endif
        </form>

        <!-- 📋 Tabel Barang -->
        <div class="bg-white p-4 rounded shadow">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama Barang</th>
                        <th class="border px-4 py-2">Rak / Laci</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($barangs as $index => $barang)
                        <tr>
                            <td class="border px-4 py-2">{{ $barangs->firstItem() + $index }}</td>
                            <td class="border px-4 py-2">{{ $barang->nama }}</td>
                            <td class="border px-4 py-2">{{ $barang->rak?->nama ?? '-' }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('barang.edit', $barang->id) }}"
                                    class="bg-yellow-400 text-white px-2 py-1 rounded text-sm">Edit</a>
                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST"
                                    class="inline-block"
                                    onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-2 py-1 rounded text-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">Barang tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- 📄 Pagination -->
            <div class="mt-4">
                {{ $barangs->withQueryString()->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
=======
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
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
