<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ✏️ Edit Penerimaan Barang
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm rounded-lg p-6">
                <form action="{{ route('penerimaan.update', $penerimaan->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block font-semibold">Nama Barang</label>
                        <input type="text" name="nama_barang" value="{{ old('nama_barang', $penerimaan->nama_barang) }}" required
                            class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label class="block font-semibold">Jumlah</label>
                        <input type="number" name="jumlah" value="{{ old('jumlah', $penerimaan->jumlah) }}" required
                            class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div>
                        <label class="block font-semibold">Tanggal Terima</label>
                        <input type="date" name="tanggal_terima" value="{{ old('tanggal_terima', $penerimaan->tanggal_terima) }}" required
                            class="w-full border-gray-300 rounded-md shadow-sm">
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('penerimaan.index') }}"
                            class="mr-3 px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">Batal</a>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>