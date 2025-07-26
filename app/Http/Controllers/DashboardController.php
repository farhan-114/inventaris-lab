<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penerimaan;
use App\Models\Peminjaman;
use App\Models\Stok;
use App\Models\Belanja;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'jumlahBarangMasuk' => Belanja::count(),
            'jumlahPeminjaman' => Peminjaman::count(),
            'jumlahStok' => Barang::sum('stok'),
        ]);
    }
}