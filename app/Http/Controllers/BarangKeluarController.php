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
        return view('barangkeluar.index', compact('barangKeluars'));
    }

    public function create()
    {
        $barangs = Barang::all();
        return view('barangkeluar.create', compact('barangs'));
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

            return redirect()->route('barangkeluar.index')->with('success', 'Barang berhasil dikeluarkan.');
        } else {
            return back()->with('error', 'Stok barang tidak mencukupi.');
        }
    }

    public function destroy($id)
    {
        $keluar = BarangKeluar::findOrFail($id);

        // Tambahkan stok kembali
        $barang = $keluar->barang;
        $barang->stok += $keluar->jumlah;
        $barang->save();

        $keluar->delete();

        return redirect()->route('barangkeluar.index')->with('success', 'Data barang keluar berhasil dihapus.');
    }
}
