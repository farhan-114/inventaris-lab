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