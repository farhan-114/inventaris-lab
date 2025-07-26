<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penerimaan;
use App\Models\Peminjaman;
use App\Models\Stok;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'jumlahBarang' => Barang::count(),
            'jumlahBarangMasuk' => Penerimaan::count(),
            'jumlahPeminjaman' => Peminjaman::count(),
            'jumlahStok' => Stok::count(),
            'peminjamanTerbaru' => Peminjaman::with('barang')->latest()->take(5)->get(),
        ]);
    }
}