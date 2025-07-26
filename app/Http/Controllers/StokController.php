<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class StokController extends Controller
{
    public function index()
    {
        $barangs = Barang::with('rak')->get();
        return view('stok.index', compact('barangs'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('stok.edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'stok' => 'required|integer|min:0',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->stok = $request->stok;
        $barang->save();

        return redirect()->route('stok.index')->with('success', 'Stok berhasil diperbarui!');
    }
<<<<<<< HEAD
}
=======

    public function destroy(Stok $stok)
    {
        $stok->delete();
        return redirect()->route('stok.index')->with('success', 'Stok berhasil dihapus!');
    }
}
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
