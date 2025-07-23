<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Rak;
use Illuminate\Http\Request;

class ScanQRController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('rak')->latest()->get();
        return view('scanqr.index', compact('barangs'));
    }

    public function create()
    {
        $raks = Rak::all();
        return view('scanqr.create', compact('raks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_qr' => 'required|unique:barangs,kode_qr',
            'rak_id' => 'required|exists:raks,id',
            'stok' => 'required|numeric|min:0',
        ]);


        Barang::create([
            'kode_barang' => 'BRG-' . time(),
            'nama_barang' => $request->nama_barang,
            'kode_qr' => $request->kode_qr,
            'rak_id' => $request->rak_id,
            'stok' => $request->stok,
            'satuan' => 'pcs',
        ]);

        return redirect()->route('scanqr.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $raks = Rak::all();
        return view('scanqr.edit', compact('barang', 'raks'));
    }

    public function update(Request $request, $id)
    {
        $barang = Barang::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'kode_qr' => 'required|unique:barangs,kode_qr,' . $barang->id,
            'rak_id' => 'required|exists:raks,id',
            'stok' => 'required|numeric|min:0',
        ]);

        $barang->update($request->all());

        return redirect()->route('scanqr.index')->with('success', 'Barang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect()->route('scanqr.index')->with('success', 'Barang berhasil dihapus.');
    }
}
