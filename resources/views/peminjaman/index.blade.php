<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            📄 Data Peminjaman Barang
        </h2>
    </x-slot>

    <div class="mt-4 text-right">
        <a href="{{ route('peminjaman.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Peminjaman
        </a>
    </div>

    <div class="bg-white rounded shadow p-4 mt-4">
        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 text-red-800 p-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Barang</th>
                    <th class="border px-4 py-2">Jumlah</th>
                    <th class="border px-4 py-2">Deskripsi</th>
                    <th class="border px-4 py-2">Tanggal Keluar</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($peminjaman as $pinjam)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">
                            {{ $pinjam->barang->nama_barang }}
                            ({{ $pinjam->barang->jumlah }} {{ $pinjam->barang->satuan }})
                        </td>
                        <td class="border px-4 py-2">{{ $pinjam->jumlah }} {{ $pinjam->barang->satuan }}</td>
                        <td class="border px-4 py-2">{{ $pinjam->deskripsi }}</td>
                        <td class="border px-4 py-2">{{ $pinjam->tanggal_keluar }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('peminjaman.edit', $pinjam->id) }}" class="text-blue-600">Edit</a> |
                            <form action="{{ route('peminjaman.destroy', $pinjam->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center py-4">Belum ada data peminjaman.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>
