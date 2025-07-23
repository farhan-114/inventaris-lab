<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

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
    }
}
