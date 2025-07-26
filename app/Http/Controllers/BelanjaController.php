<?php

namespace App\Http\Controllers;

use App\Models\Belanja;
use Illuminate\Http\Request;

class BelanjaController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $belanjas = Belanja::all();
=======
        $belanjas = Belanja::latest()->get();
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
        return view('belanja.index', compact('belanjas'));
    }

    public function create()
    {
        return view('belanja.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ]);

        Belanja::create([
            'nama_barang' => $request->nama_barang,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'tanggal' => now(),
        ]);
        return redirect()->route('belanja.index')->with('success', 'Belanja berhasil ditambahkan!');
    }

    public function edit(Belanja $belanja)
    {
        return view('belanja.edit', compact('belanja'));
    }

    public function update(Request $request, Belanja $belanja)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
        ]);

        $belanja->update($request->all());

        return redirect()->route('belanja.index')->with('success', 'Belanja berhasil diperbarui!');
    }

    public function destroy(Belanja $belanja)
    {
        $belanja->delete();
        return redirect()->route('belanja.index')->with('success', 'Belanja berhasil dihapus!');
<<<<<<< HEAD
        return view('belanja.index');
=======
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
    }
}
