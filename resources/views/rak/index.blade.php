<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Rak / Laci</h2>
    </x-slot>

    <div class="py-12 px-4">
        <div class="bg-white p-6 rounded shadow">
            <p class="text-gray-600">Ini adalah halaman dummy untuk fitur Rak / Laci.</p>
        </div>
    </div>
</x-app-layout>

@extends('layouts.app')

@section('content')
    <div class="mb-4">
        <h1 class="text-xl font-bold text-gray-800">📁 Daftar Rak / Laci</h1>
        <a href="{{ route('rak.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mt-2 inline-block">+ Tambah Rak</a>
    </div>

    <div class="bg-white p-4 shadow rounded">
        <table class="w-full border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">No</th>
                    <th class="border px-4 py-2">Nama Rak</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($raks as $index => $rak)
                    <tr>
                        <td class="border px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border px-4 py-2">{{ $rak->nama }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection