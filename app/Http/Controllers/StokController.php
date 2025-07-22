<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Barang;
=======
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
use Illuminate\Http\Request;

class StokController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        $barangs = Barang::with('rak')->get();
        return view('stok.index', compact('barangs'));
    }

    public function create()
    {
        return view('stok.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        Stok::create($request->all());

        return redirect()->route('stok.index')->with('success', 'Stok berhasil ditambahkan!');
    }

    public function edit(Stok $stok)
    {
        return view('stok.edit', compact('stok'));
    }

    public function update(Request $request, Stok $stok)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
        ]);

        $stok->update($request->all());

        return redirect()->route('stok.index')->with('success', 'Stok berhasil diperbarui!');
    }

    public function destroy(Stok $stok)
    {
        $stok->delete();
        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus!');
    }
}
=======
    //
}
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
