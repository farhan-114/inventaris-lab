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
        'nama', 'rak_id',
    ];
    
    public function rak()   
    {
        return $this->belongsTo(Rak::class);
    }

    // 👇 Tambahkan ini
    public function barangKeluars()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}