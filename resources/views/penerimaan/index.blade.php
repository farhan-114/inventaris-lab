<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            📥 Penerimaan Barang
        </h2>
    </x-slot>

    <div class="bg-white rounded shadow p-4 mt-4">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Barang</th>
                    <th class="border px-4 py-2">Jumlah</th>
                    <th class="border px-4 py-2">Harga</th>
                    <th class="border px-4 py-2">Tanggal Belanja</th>
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
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">Belum ada data belanja.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>