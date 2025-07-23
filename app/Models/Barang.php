<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'stok',
        'jumlah',
        'satuan',
        'rak_id',
    ];

    public function stok()
    {
        return $this->hasOne(\App\Models\Stok::class);
    }

    // Relasi ke rak
    public function rak()
    {
        return $this->belongsTo(Rak::class);
    }
}
