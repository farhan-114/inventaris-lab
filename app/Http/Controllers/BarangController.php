<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Rak;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
{
    $query = \App\Models\Barang::with('rak');

    // Filter berdasarkan rak jika ada
    if ($request->rak_id) {
        $query->where('rak_id', $request->rak_id);
    }

    // Pencarian nama barang
    if ($request->cari) {
        $query->where('nama', 'like', '%' . $request->cari . '%');
    }

    $barangs = $query->paginate(10); // pagination 10 per halaman
    $raks = \App\Models\Rak::all();

    return view('barang.index', compact('barangs', 'raks'));
}

    public function create()
    {
        $raks = \App\Models\Rak::all();
        return view('barang.create', compact('raks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'rak_id' => 'nullable|exists:raks,id',
        ]);

        \App\Models\Barang::create([
            'nama' => $request->nama,
            'rak_id' => $request->rak_id,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $raks = Rak::all();
        return view('barang.edit', compact('barang', 'raks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'rak_id' => 'nullable|exists:raks,id',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update([
            'nama' => $request->nama,
            'rak_id' => $request->rak_id,
        ]);

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}