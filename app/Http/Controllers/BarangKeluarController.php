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
<<<<<<< HEAD
        return view('barangkeluar.index', compact('barangKeluars'));
=======
        return view('barang-keluar.index', compact('barangKeluars'));
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
    }

    public function create()
    {
        $barangs = Barang::all();
<<<<<<< HEAD
        return view('barangkeluar.create', compact('barangs'));
=======
        return view('barang-keluar.create', compact('barangs'));
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
<<<<<<< HEAD
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
=======
            'keterangan' => 'nullable|string|max:255',
        ]);

        BarangKeluar::create($request->all());

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil ditambahkan!');
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
        $barangKeluar->delete();

        return redirect()->route('barang-keluar.index')->with('success', 'Barang keluar berhasil dihapus!');
    }
}
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
