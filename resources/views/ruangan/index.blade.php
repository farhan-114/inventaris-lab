<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white">🏢 Daftar Ruangan Peminjam Barang</h2>
    </x-slot>

    <div class="py-6 px-6">
        <div class="bg-white p-6 rounded shadow">
            <table class="w-full border text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Ruangan</th>
                        <th class="border px-4 py-2">Jumlah Barang Dipinjam</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($peminjaman as $index => $item)
                        <tr>
                            <td class="border px-4 py-2">{{ $index + 1 }}</td>
                            <td class="border px-4 py-2">{{ $item->ruangan }}</td>
                            <td class="border px-4 py-2">
                                {{ \App\Models\Peminjaman::where('ruangan', $item->ruangan)->count() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center py-4 text-gray-500">Belum ada peminjaman.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>