<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangMasuk;

class BarangMasukController extends Controller
{
    public function index()
    {
        $data = BarangMasuk::all(); // ✅ variabel $data untuk view
        return view('barang_masuk.index', compact('data'));
    }

    public function create()
    {
        return view('barang_masuk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required|numeric',
            'tanggal_masuk' => 'required|date',
        ]);

        BarangMasuk::create($request->all());

        return redirect()->route('barang-masuk.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $item = BarangMasuk::findOrFail($id);
        $item->delete();

        return redirect()->route('barang-masuk.index')->with('success', 'Data berhasil dihapus.');
    }
}