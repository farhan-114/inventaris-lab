<x-app-layout>
    <div class="bg-white p-6 rounded shadow max-w-lg mx-auto">
        <h1 class="text-xl font-bold mb-4">Edit Rak</h1>

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('rak.update', $rak->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="nama" class="block font-semibold">Nama Rak</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama', $rak->nama) }}" 
                       class="w-full border rounded px-3 py-2" required>
            </div>

            <div class="flex items-center">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                    Update
                </button>
                <a href="{{ route('rak.index') }}" class="ml-3 text-gray-600">Kembali</a>
            </div>
        </form>
    </div>
</x-app-layout>