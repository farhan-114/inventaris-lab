<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">📦 Inventaris Barang</h2>
    </x-slot>

    <div class="py-12 px-4">
        <div class="mb-4">
            <a href="{{ route('barang.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-2 inline-block">+ Tambah Barang</a>
        </div>

        <div class="bg-white p-4 shadow rounded">
            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama Barang</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($barangs as $index => $barang)
                        <tr>
                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $barang->nama }}</td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('barang.edit', $barang->id) }}" class="text-blue-500 hover:underline">Edit</a>
                                <form action="{{ route('barang.destroy', $barang->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline" onclick="return confirm('Hapus barang ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>