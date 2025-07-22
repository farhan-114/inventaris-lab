<?php

namespace App\Http\Controllers;

use App\Models\Barang;
<<<<<<< HEAD
use App\Models\Peminjaman;
use App\Models\Stok;
use App\Models\Penerimaan;
=======
use App\Models\BarangMasuk;
use App\Models\Peminjaman;
use App\Models\Stok;
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [  
            'jumlahBarang' => Barang::count(),
<<<<<<< HEAD
            'jumlahBarangMasuk' => Penerimaan::count(),
            'jumlahPeminjaman' => Peminjaman::count(),
            'jumlahStok' => Stok::count(),
            'peminjamanTerbaru' => Peminjaman::with('barang')->latest()->take(5)->get(),
=======
            'jumlahBarangMasuk' => BarangMasuk::count(),
            'jumlahPeminjaman' => Peminjaman::count(),
            'jumlahStok' => Stok::count(),
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
        ]);
    }
}