<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerimaan;
use App\Models\BarangKeluar;
use Barryvdh\DomPDF\Facade\Pdf; // kalau pakai dompdf

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $tanggal_awal = $request->tanggal_awal;
        $tanggal_akhir = $request->tanggal_akhir;

        $queryMasuk = Penerimaan::query();
        $queryKeluar = BarangKeluar::query();

        if ($tanggal_awal && $tanggal_akhir) {
            $queryMasuk->whereBetween('created_at', [$tanggal_awal, $tanggal_akhir]);
            $queryKeluar->whereBetween('tanggal_keluar', [$tanggal_awal, $tanggal_akhir]);
        }

        return view('laporan.index', [
            'barangMasuk' => $queryMasuk->get(),
            'barangKeluar' => $queryKeluar->get(),
        ]);
    }

    public function exportPdfMasuk()
    {
        $barangMasuk = Penerimaan::all();
        $pdf = Pdf::loadView('laporan.pdf-masuk', compact('barangMasuk'));
        return $pdf->download('laporan-barang-masuk.pdf');
    }

    public function exportPdfKeluar()
    {
        $barangKeluar = BarangKeluar::with('barang')->get();
        $pdf = Pdf::loadView('laporan.pdf-keluar', compact('barangKeluar'));
        return $pdf->download('laporan-barang-keluar.pdf');
    }
<<<<<<< HEAD
}
=======
}
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
