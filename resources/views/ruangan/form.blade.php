<x-app-layout>
    <div class="max-w-xl mx-auto bg-white p-6 shadow-md rounded">
        <h2 class="text-2xl font-semibold mb-4">{{ $title }}</h2>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ $action }}">
            @csrf
            @if (isset($ruangan))
                @method('PUT')
            @endif
<<<<<<< HEAD

=======
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-1">Nama Ruangan</label>
                <input type="text" name="name" id="name" value="{{ old('name') ?? ($ruangan->name ?? '') }}" class="w-full border rounded px-3 py-2" required>
            </div>
            <div class="mb-4">
                <label for="is_active" class="block text-gray-700 font-medium mb-1">Status</label>
                <select name="is_active" id="is_active" class="w-full border rounded px-3 py-2">
                    <option value="1" {{ old('is_active', $ruangan->is_active ?? 1) == 1 ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ old('is_active', $ruangan->is_active ?? 0) == 0 ? 'selected' : '' }}>Tidak Aktif</option>
                </select>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('ruangan.index') }}" class="text-gray-600 hover:underline">← Kembali</a>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    💾 Simpan
                </button>
            </div>
        </form>
    </div>
<<<<<<< HEAD
</x-app-layout>
=======
</x-app-layout>
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
