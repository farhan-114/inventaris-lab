@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4 text-gray-800">📝 Tambah Rak / Laci</h1>

    <form action="{{ route('rak.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label for="nama" class="block font-semibold">Nama Rak</label>
            <input type="text" name="nama" id="nama" class="w-full border rounded px-3 py-2" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection