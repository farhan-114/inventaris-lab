<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BelanjaController;
use App\Http\Controllers\RakController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KategoriBarangController;
use App\Http\Controllers\PenerimaanController;
use App\Models\Barang;
use App\Models\BarangMasuk;

// ✅ Halaman Awal
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    $jumlahBarang = Barang::count();
    $jumlahBarangMasuk = BarangMasuk::count();
    return view('dashboard', compact('jumlahBarang', 'jumlahBarangMasuk'));
})->middleware(['auth'])->name('dashboard');    

Route::get('/profile', function () {
    return view('profile.edit');
})->middleware(['auth'])->name('profile.edit');

// Resource Barang
Route::middleware(['auth'])->group(function () {
    Route::view('scanqr', 'scanqr.index')->name('scanqr.index');
    Route::view('ruangan', 'ruangan.index')->name('ruangan.index');
    Route::view('kategori-barang', 'barang_kategori.index')->name('kategori.index');
    Route::view('belanja', 'belanja.index')->name('belanja.index');
    Route::view('stok', 'stok.index')->name('stok.index');
    Route::view('peminjaman', 'peminjaman.index')->name('peminjaman.index');
    Route::view('laporan', 'laporan.index')->name('laporan.index');
    Route::resource('kategori', KategoriController::class);
    Route::resource('kategori-barang', KategoriBarangController::class)->only(['index']);   
    Route::resource('barang', BarangController::class)->middleware('auth');
    Route::get('/rak', [RakController::class, 'index'])->middleware(['auth'])->name('rak.index');
    Route::get('/belanja', [BelanjaController::class, 'index'])->name('belanja.index');
    Route::get('/penerimaan', [PenerimaanController::class, 'index'])->name('penerimaan.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Barang Masuk
    Route::resource('barang-masuk', BarangMasukController::class);
});

// ✅ Otentikasi Laravel Breeze
require __DIR__.'/auth.php';