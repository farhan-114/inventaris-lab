<x-app-layout>
    <x-slot name="header">
<<<<<<< HEAD
        <h1 class="font-semibold text-xl text-white leading-tight">
            Kategori Barang
        </h1>
    </x-slot>

            @if(session('success'))
            <div class="bg-green-100 text-green-800 p-2 mb-4 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('kategori-barang.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Kategori</a>

        <table class="min-w-full bg-white border">
            <thead>
                <tr>
                    <th class="px-4 py-2 border">No</th>
                    <th class="px-4 py-2 border">Nama Kategori</th>
                    <th class="px-4 py-2 border">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategoris as $kategori)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border">{{ $kategori->nama }}</td>
                        <td class="px-4 py-2 border">
                            <a href="{{ route('kategori-barang.edit', $kategori->id) }}" class="text-blue-600">Edit</a> |
                            <form action="{{ route('kategori-barang.destroy', $kategori->id) }}" method="POST" class="inline" onsubmit="return confirm('Hapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-4">Belum ada kategori.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
=======
        <h2 class="font-semibold text-xl text-white">Kategori Barang</h2>
    </x-slot>

    <div class="py-12 px-4">
        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-600">Ini adalah halaman Kategori Barang.</p>
        </div>
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
    </div>
</x-app-layout>