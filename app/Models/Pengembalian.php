<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

    protected $fillable = ['barang_id', 'jumlah', 'deskripsi', 'tanggal_pengembalian'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}