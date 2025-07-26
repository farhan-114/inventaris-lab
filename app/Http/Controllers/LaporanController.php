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

        $queryMasuk = Penerimaan::with('barang');
        $queryKeluar = BarangKeluar::with('barang');

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
        $barangMasuk = Penerimaan::with('penerimaan')->get();
        $pdf = Pdf::loadView('laporan.pdf-masuk', compact('penerimaan'));
        return $pdf->download('laporan-barang-masuk.pdf');
    }

    public function exportPdfKeluar()
    {
        $barangKeluar = BarangKeluar::with('barang')->get();
        $pdf = Pdf::loadView('laporan.pdf-keluar', compact('barangKeluar'));
        return $pdf->download('laporan-barang-keluar.pdf');
    }
}