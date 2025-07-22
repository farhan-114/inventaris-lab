<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Barang;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalians = Pengembalian::with('barang')->latest()->get();
        return view('pengembalian.index', compact('pengembalians'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('pengembalian.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'deskripsi' => 'nullable|string',
        ]);

        // tambah ke tabel pengembalian
        Pengembalian::create([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'deskripsi' => $request->deskripsi,
            'tanggal_pengembalian' => now(),
        ]);

        // update stok barang
        $barang = Barang::findOrFail($request->barang_id);
        $barang->increment('stok', $request->jumlah);

        return redirect()->route('pengembalian.index')->with('success', 'Barang berhasil dikembalikan.');
    }
}