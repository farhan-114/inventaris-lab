<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barangs';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'stok',
        'satuan',
    ];

    // 👇 Tambahkan ini
    public function barangKeluars()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}