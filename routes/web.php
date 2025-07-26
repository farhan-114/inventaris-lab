<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\DashboardController;
<<<<<<< HEAD
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\ScanQRController;
use App\Http\Controllers\StokController;

=======
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\ScanQRController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\StokController;
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Rak;

Route::get('/', function () {
    return redirect()->route('login');
<<<<<<< HEAD
    return view('welcome');
=======
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', function () {
        return view('profile.edit');
    })->name('profile.edit');

    Route::resource('scanqr', ScanQRController::class);
    Route::resource('ruangan', RuanganController::class);
    Route::view('peminjaman', 'peminjaman.index')->name('peminjaman.index');
    Route::view('laporan', 'laporan.index')->name('laporan.index');
    
    Route::resource('kategori-barang', \App\Http\Controllers\KategoriController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('barang-keluar', BarangKeluarController::class);
    Route::resource('belanja', App\Http\Controllers\BelanjaController::class);
    Route::resource('peminjaman', \App\Http\Controllers\PeminjamanController::class);
    Route::resource('pengembalian', \App\Http\Controllers\PengembalianController::class)->middleware('auth');
    Route::resource('rak', \App\Http\Controllers\RakController::class);
    Route::resource('ruangan', RuanganController::class)->only(['index'])->middleware('auth');
    Route::resource('scan-qr-barang', \App\Http\Controllers\ScanQrBarangController::class)->middleware('auth');
    Route::resource('stok', \App\Http\Controllers\StokController::class);

    Route::get('barangkeluar', [BarangKeluarController::class, 'index'])->name('barangkeluar.index');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/export-pdf-masuk', [LaporanController::class, 'exportPdfMasuk'])->name('laporan.export-pdf-masuk');
    Route::get('/laporan/export-pdf-keluar', [LaporanController::class, 'exportPdfKeluar'])->name('laporan.export-pdf-keluar');
    Route::get('/penerimaan', [PenerimaanController::class, 'index'])->name('penerimaan.index');
<<<<<<< HEAD
=======
    Route::get('/stok', [StokController::class, 'index'])->name('stok.index');

>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Barang Masuk
    Route::resource('barang-masuk', BarangMasukController::class);
});
<<<<<<< HEAD

// ✅ Otentikasi Laravel Breeze
require __DIR__ . '/auth.php';
=======
require __DIR__ . '/auth.php';
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
