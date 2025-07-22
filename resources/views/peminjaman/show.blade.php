<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            📄 Detail Peminjaman
        </h2>
    </x-slot>

    <div class="bg-white rounded shadow p-4 mt-4 space-y-4">
        <div>
            <strong>Nama Barang:</strong> {{ $peminjaman->barang->nama_barang }}
        </div>
        <div>
            <strong>Jumlah:</strong> {{ $peminjaman->jumlah }}
        </div>
        <div>
            <strong>Deskripsi:</strong> {{ $peminjaman->deskripsi ?? '-' }}
        </div>
        <div>
            <strong>Tanggal Pinjam:</strong> {{ $peminjaman->tanggal_keluar }}
        </div>
        <div>
            <a href="{{ route('peminjaman.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
            <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded ml-2">Edit</a>
        </div>
    </div>
</x-app-layout>