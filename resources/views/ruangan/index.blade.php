<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">
            Data Ruangan
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 text-right">
        <a href="{{ route('ruangan.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Data
        </a>
    </div>

    <div class="bg-white rounded shadow p-4 overflow-x-auto">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2" style="width: 5%">No</th>
                    <th class="border px-4 py-2">Nama Ruangan</th>
                    <th class="border px-4 py-2" style="width: 15%">Status</th>
                    <th class="border px-4 py-2" style="width: 15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ruangans as $item)
                    <tr>
                        <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2">{{ $item->name }}</td>
                        <td class="border px-4 py-2 text-center">{{ $item->is_active ? 'Aktif' : 'Tidak Aktif' }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('ruangan.edit', $item->id) }}" class="text-blue-500 hover:underline">Edit</a>
                            |
                            <form action="{{ route('ruangan.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-gray-500">Belum ada data.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
<<<<<<< HEAD
</x-app-layout>
=======
</x-app-layout>
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
