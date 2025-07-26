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
    protected $table = 'peminjamans';

>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
    protected $fillable = [
        'barang_id', 'jumlah', 'ruangan', 'tanggal', 'keterangan'
    ];

    // ✅ Relasi ke Barang
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}
