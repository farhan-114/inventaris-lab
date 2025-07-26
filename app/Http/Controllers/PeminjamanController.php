<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::with('barang')->latest()->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $barangs = \App\Models\Barang::all();
        return view('peminjaman.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'ruangan' => 'required|string',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string',
        ]);

        Peminjaman::create([
        'barang_id' => $request->barang_id,
        'jumlah' => $request->jumlah,
        'ruangan' => $request->ruangan,
        'tanggal_keluar' => $request->tanggal,
        'deskripsi' => $request->deskripsi,
        ]);

        $barang = Barang::findorFail($request->barang_id);
        $barang->stok -= $request->jumlah;
        $barang->save();

    return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }
}