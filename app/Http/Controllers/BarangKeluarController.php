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
            'barang_id'  => 'required|exists:barangs,id',
            'jumlah'     => 'required|integer|min:1',
            'deskripsi'  => 'required|string|max:255',
        ]);

        $barang = Barang::findOrFail($request->barang_id);

        if ($barang->stok >= $request->jumlah) {
            // Kurangi stok
            $barang->stok -= $request->jumlah;
            $barang->save();

            BarangKeluar::create([
                'barang_id'      => $request->barang_id,
                'jumlah'         => $request->jumlah,
                'deskripsi'      => $request->deskripsi,
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
            'barang_id'  => 'required|exists:barangs,id',
            'jumlah'     => 'required|integer|min:1',
            'deskripsi'  => 'required|string|max:255',
        ]);

        // Kembalikan stok lama
        $barangLama = $barangKeluar->barang;
        $barangLama->stok += $barangKeluar->jumlah;
        $barangLama->save();

        // Kurangi stok baru
        $barangBaru = Barang::findOrFail($request->barang_id);
        if ($barangBaru->stok >= $request->jumlah) {
            $barangBaru->stok -= $request->jumlah;
            $barangBaru->save();

            $barangKeluar->update([
                'barang_id'      => $request->barang_id,
                'jumlah'         => $request->jumlah,
                'deskripsi'      => $request->deskripsi,
                'tanggal_keluar' => now(),
            ]);

            return redirect()->route('barang-keluar.index')->with('success', 'Data barang keluar berhasil diperbarui!');
        } else {
            // Kembalikan stok lama kalau stok baru tidak cukup
            $barangLama->stok -= $barangKeluar->jumlah;
            $barangLama->save();

            return back()->with('error', 'Stok barang baru tidak mencukupi.');
        }
    }

    public function destroy(BarangKeluar $barangKeluar)
    {
        // Kembalikan stok saat data dihapus
        $barang = $barangKeluar->barang;
        $barang->stok += $barangKeluar->jumlah;
        $barang->save();

        $barangKeluar->delete();

        return redirect()->route('barang-keluar.index')->with('success', 'Data barang keluar berhasil dihapus.');
    }
}