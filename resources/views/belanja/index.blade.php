<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            📦 Data Belanja Barang
        </h2>
    </x-slot>

            @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
            @endif

    <div class="mb-4 text-right">
        <a href="{{ route('belanja.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Barang
        </a>

        <div class="bg-white rounded shadow p-4 mt-4">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Barang</th>
                    <th class="border px-4 py-2">Jumlah</th>
                    <th class="border px-4 py-2">Harga</th>
                    <th class="border px-4 py-2">Tanggal</th>
                    <th class="border px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($belanjas as $belanja)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $belanja->nama_barang }}</td>
                        <td class="border px-4 py-2">{{ $belanja->jumlah }}</td>
                        <td class="border px-4 py-2">Rp {{ number_format($belanja->harga, 0, ',', '.') }}</td>
                        <td class="border px-4 py-2">{{ $belanja->tanggal }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('belanja.edit', $belanja->id) }}" class="text-blue-600">Edit</a> |
                            <form action="{{ route('belanja.destroy', $belanja->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus belanja ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">Belum ada data belanja.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>