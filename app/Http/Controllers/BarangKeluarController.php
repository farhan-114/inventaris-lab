<?php

namespace App\Http\Controllers;

use App\Models\BarangKeluar;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $barangKeluars = BarangKeluar::with('barang')->latest()->get();
        return view('barang-keluar.index', compact('barangKeluars'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barang-keluar.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'deskripsi' => 'required|string',
        ]);

        // Ambil barang yang dipilih
        $barang = Barang::findOrFail($request->barang_id);

        // Kurangi stok barang
        if ($barang->stok >= $request->jumlah) {
            $barang->stok -= $request->jumlah;
            $barang->save();

            BarangKeluar::create([
                'barang_id' => $request->barang_id,
                'jumlah' => $request->jumlah,
                'deskripsi' => $request->deskripsi,
                'tanggal_keluar' => now(),
            ]);

            return redirect()->route('barang-keluar.index')->with('success', 'Barang berhasil dikeluarkan.');
        } else {
            return back()->with('error', 'Stok barang tidak mencukupi.');
        }
    }

    public function edit(BarangKeluar $barangKeluar)
    {
        $barangs = Barang::all();
        return view('barang-keluar.edit', compact('barangKeluar', 'barangs'));
    }

    public function update(Request $request, BarangKeluar $barangKeluar)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $barangKeluar->update($request->all());

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil diperbarui!');
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        // Tambahkan stok kembali saat hapus
        $barang = $barangKeluar->barang;
        $barang->stok += $barangKeluar->jumlah;
        $barang->save();

        $barangKeluar->delete();

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil dihapus!');
    }
}