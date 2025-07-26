<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Kategori::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kategori-barang.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit(Kategori $kategori_barang)
    {
        return view('kategori.edit', ['kategori' => $kategori_barang]);
    }

    public function update(Request $request, Kategori $kategori_barang)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        $kategori_barang->update([
            'nama' => $request->nama,
        ]);

        return redirect()->route('kategori-barang.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function destroy(Kategori $kategori_barang)
    {
        $kategori_barang->delete();
        return redirect()->route('kategori-barang.index')->with('success', 'Kategori berhasil dihapus!');
    }
} 