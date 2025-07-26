<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Rak;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(Request $request)
    {
<<<<<<< HEAD
    
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
=======
        $query = Barang::with('rak');

        if ($request->rak_id) {
            $query->where('rak_id', $request->rak_id);
        }

        if ($request->cari) {
            $query->where('nama_barang', 'like', '%' . $request->cari . '%');
        }

        $barangs = $query->paginate(10);
        $raks = Rak::all();

        return view('barang.index', compact('barangs', 'raks'));
    }

    public function create()
    {
        $raks = Rak::all();
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
        return view('barang.create', compact('raks'));
    }

    public function store(Request $request)
    {
        $request->validate([
<<<<<<< HEAD
            'nama' => 'required|string|max:255',
            'rak_id' => 'nullable|exists:raks,id',
        ]);

        \App\Models\Barang::create([
            'nama' => $request->nama,
=======
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
            'rak_id' => 'nullable|exists:raks,id',
        ]);

        Barang::create([
            'kode_barang' => 'BRG-' . time(), // generate unik
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
            'stok' => 0,
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
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
<<<<<<< HEAD
            'nama' => 'required|string|max:255',
=======
            'nama_barang' => 'required|string|max:255',
            'satuan' => 'required|string|max:50',
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
            'rak_id' => 'nullable|exists:raks,id',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update([
<<<<<<< HEAD
            'nama' => $request->nama,
=======
            'nama_barang' => $request->nama_barang,
            'satuan' => $request->satuan,
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
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
