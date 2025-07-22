<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Peminjaman;
use App\Models\Barang;
=======
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $peminjaman = Peminjaman::with('barang')->latest()->get();
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $barangs = \App\Models\Barang::with('stok')->get();
        return view('peminjaman.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'jumlah' => 'required|integer|min:1',
            'ruangan' => 'required|string',
            'tanggal_keluar' => 'required|date',
            'deskripsi' => 'nullable|string',
        ]);

        Peminjaman::create($request->all());
        $barang = Barang::find($request->barang_id);
        $barang->jumlah -= $request->jumlah;
        $barang->save();

        return redirect()->route('peminjaman.index')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }
}
=======
    //
}
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
