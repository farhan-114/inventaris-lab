<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Barang::query();

    if ($request->has('search')) {
        $search = $request->search;
        $query->where('nama_barang', 'like', "%$search%")
              ->orWhere('kode_barang', 'like', "%$search%")
              ->orWhere('kategori', 'like', "%$search%");
    }

    $barangs = $query->get();

    return view('barang.index', compact('barangs')); // ✅ harus "barangs"
}

    public function create()
{
    return view('barang.create');
}

    public function store(Request $request)
{
    $validated = $request->validate([
        'kode_barang' => 'required|unique:barangs,kode_barang',
        'nama_barang' => 'required|string|max:255',
        'kategori' => 'nullable|string|max:100',
        'stok' => 'required|integer|min:0',
        'satuan' => 'required|string|max:50',
    ]);

    \App\Models\Barang::create($validated);

    return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
}

    public function show(Barang $barang)
    {
        //
    }

    public function edit(Barang $barang)
{
    return view('barang.edit', compact('barang'));
}

public function update(Request $request, Barang $barang)
{
    $request->validate([
        'kode_barang' => 'required|unique:barangs,kode_barang,' . $barang->id,
        'nama_barang' => 'required',
        'kategori' => 'required',
        'stok' => 'required|integer',
        'satuan' => 'required',
    ]);

    $barang->update($request->all());

    return redirect()->route('barang.index')->with('success', 'Barang berhasil diupdate!');
}

    public function destroy(Barang $barang)
{
    $barang->delete();
    return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus!');
}
}