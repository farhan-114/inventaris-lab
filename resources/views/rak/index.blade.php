<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            🗃️ Daftar Rak / Laci
        </h2>
    </x-slot>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4 text-right">
        <a href="{{ route('rak.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Tambah Rak
        </a>
    </div>
        <div class="bg-white rounded shadow p-4">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">No</th>

                        <th class="border px-4 py-2">Nama Rak</th>

                        <th class="border px-4 py-2">Jumlah Barang</th>

                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($raks as $index => $rak)
                    <tr>
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $rak->nama }}</td>
                        <td class="border px-4 py-2">{{ $rak->barangs_count }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('rak.edit', $rak->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded text-sm">Edit</a>
                            <form action="{{ route('rak.destroy', $rak->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus rak ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded text-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">Belum ada rak.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</x-app-layout>