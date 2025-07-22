<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\ScanQRController;
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Rak;

// ✅ Halaman Awal
Route::get('/', function () {
    return redirect()->route('login');
});

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/profile', function () {
    return view('profile.edit');
})->middleware(['auth'])->name('profile.edit');

// Resource Barang
Route::middleware(['auth'])->group(function () {
    Route::resource('scanqr', ScanQRController::class);
    Route::resource('ruangan', RuanganController::class);
    Route::view('peminjaman', 'peminjaman.index')->name('peminjaman.index');
    Route::view('laporan', 'laporan.index')->name('laporan.index');

    Route::resource('kategori-barang', KategoriController::class)->middleware('auth');
    Route::resource('barang', BarangController::class);
    Route::resource('barangkeluar', BarangKeluarController::class);
    Route::resource('belanja', BelanjaController::class);
    Route::resource('peminjaman', \App\Http\Controllers\PeminjamanController::class);
    Route::resource('pengembalian', \App\Http\Controllers\PengembalianController::class)->middleware('auth');
    Route::resource('rak', \App\Http\Controllers\RakController::class);
    Route::resource('ruangan', RuanganController::class);
    Route::resource('scan-qr-barang', \App\Http\Controllers\ScanQrBarangController::class)->middleware('auth');
    Route::resource('stok', \App\Http\Controllers\StokController::class)->middleware('auth');

    Route::get('barangkeluar', [BarangKeluarController::class, 'index'])->name('barangkeluar.index');
    Route::get('/belanja', [BelanjaController::class, 'index'])->name('belanja.index');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/export-pdf-masuk', [LaporanController::class, 'exportPdfMasuk'])->name('laporan.export-pdf-masuk');
    Route::get('/laporan/export-pdf-keluar', [LaporanController::class, 'exportPdfKeluar'])->name('laporan.export-pdf-keluar');   
    Route::get('/penerimaan', [PenerimaanController::class, 'index'])->name('penerimaan.index');
    Route::get('/stok', [\App\Http\Controllers\StokController::class, 'index'])->name('stok.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Barang Masuk
    Route::resource('barang-masuk', BarangMasukController::class);
});

// ✅ Otentikasi Laravel Breeze
require __DIR__ . '/auth.php';
