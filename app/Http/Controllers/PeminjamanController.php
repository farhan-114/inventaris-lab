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
        $barangs = Barang::all();
        return view('peminjaman.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'ruangan' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        Peminjaman::create([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'ruangan' => $request->ruangan,
            'tanggal' => now(), // otomatis set tanggal saat disimpan
            'keterangan' => $request->keterangan,
        ]);

        $barang = Barang::findOrFail($request->barang_id);
        $barang->stok -= $request->jumlah;
        $barang->save();

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    // ✅ Tambahkan method edit
    public function edit($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $barangs = Barang::all();

        return view('peminjaman.edit', compact('peminjaman', 'barangs'));
    }

    // ✅ Tambahkan method update
    public function update(Request $request, $id)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'ruangan' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        $peminjaman->update([
            'barang_id' => $request->barang_id,
            'jumlah' => $request->jumlah,
            'ruangan' => $request->ruangan,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        // Tambahkan stok barang kembali
        $barang = $peminjaman->barang;
        $barang->stok += $peminjaman->jumlah;
        $barang->save();

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}