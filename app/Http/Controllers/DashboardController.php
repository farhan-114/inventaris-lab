<?php

namespace App\Http\Controllers;

use App\Models\Barang;
<<<<<<< HEAD
use App\Models\BarangMasuk;
use App\Models\Peminjaman;
use App\Models\Stok;
=======
use App\Models\Peminjaman;
use App\Models\Stok;
use App\Models\Penerimaan;
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'jumlahBarang' => Barang::count(),
<<<<<<< HEAD
            'jumlahBarangMasuk' => BarangMasuk::count(),
            'jumlahPeminjaman' => Peminjaman::count(),
            'jumlahStok' => Stok::count(),
=======
            'jumlahBarangMasuk' => Penerimaan::count(),
            'jumlahPeminjaman' => Peminjaman::count(),
            'jumlahStok' => Stok::count(),
            'peminjamanTerbaru' => Peminjaman::with('barang')->latest()->take(5)->get(),
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
        ]);
    }
}
