<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    use HasFactory;

<<<<<<< HEAD
    // Pilih salah satu saja $fillable
=======
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
    protected $fillable = [
        'barang_id',
        'jumlah',
        'deskripsi',
        'tanggal_keluar',
        // atau 'keterangan' kalau pakai keterangan
    ];

    // Relasi ke Barang
    public function barang()
    {
        return $this->belongsTo(\App\Models\Barang::class);
    }
}
