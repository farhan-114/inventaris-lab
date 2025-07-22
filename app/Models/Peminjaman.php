<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $table = 'peminjamen';

=======
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
    protected $fillable = [
        'barang_id', 'jumlah', 'ruangan', 'tanggal', 'keterangan'
    ];

    // ✅ Relasi ke Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}   