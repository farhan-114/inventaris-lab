<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white">📝 Tambah Rak / Laci</h2>
    </x-slot>

    <form action="{{ route('rak.store') }}" method="POST" class="space-y-4 bg-white rounded shadow p-4">
        @csrf
        <div>
            <label for="nama" class="block font-semibold">Nama Rak</label>
            <input type="text" name="nama" id="nama" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
    </form>
</x-app-layout>