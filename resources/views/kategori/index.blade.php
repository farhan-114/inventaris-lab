<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">
            📂 Kategori Barang
        </h2>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4 text-right">
            <a href="{{ route('kategori-barang.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                + Tambah Kategori
            </a>
        </div>

        <div class="bg-white rounded shadow p-4">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2" style="width: 5%">No</th>
                        <th class="border px-4 py-2">Nama Kategori</th>
                        <th class="border px-4 py-2" style="width: 20%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kategoris as $kategori)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $kategori->nama }}</td>
                            <td class="border px-4 py-2 text-center">
                                <a href="{{ route('kategori-barang.edit', $kategori->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                |
                                <form action="{{ route('kategori-barang.destroy', $kategori->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-gray-500">Belum ada data kategori.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>