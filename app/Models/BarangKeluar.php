<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = [
        'barang_id',
        'jumlah',
        'deskripsi',
        'tanggal_keluar',
    ];

    // Relasi ke Barang
    public function barang()
    {
        return $this->belongsTo(\App\Models\Barang::class);
=======
    protected $fillable = ['barang_id', 'jumlah', 'keterangan'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
    }
}