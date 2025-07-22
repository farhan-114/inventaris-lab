<?php

namespace App\Http\Controllers;

use App\Models\Rak;
use Illuminate\Http\Request;

class RakController extends Controller
{
    public function index()
    {
        $raks = Rak::withCount('barangs')->get();
        return view('rak.index', compact('raks'));
    }

    public function create()
    {
        return view('rak.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        Rak::create([
            'nama' => $request->nama,
        ]);

        return redirect()->route('rak.index')->with('success', 'Rak berhasil ditambahkan.');
    }
<<<<<<< HEAD
    public function destroy($id)
    {
        $rak = \App\Models\Rak::findOrFail($id);
        $rak->delete();
        
        return redirect()->route('rak.index')
        ->with('success', 'Rak berhasil dihapus.');
    }
=======
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
}