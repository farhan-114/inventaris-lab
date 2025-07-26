<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Peminjaman;
use App\Models\Stok;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [  
            'jumlahBarang' => Barang::count(),
            'jumlahBarangMasuk' => BarangMasuk::count(),
            'jumlahPeminjaman' => Peminjaman::count(),
            'jumlahStok' => Stok::count(),
        ]);
    }
}