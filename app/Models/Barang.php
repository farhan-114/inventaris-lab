<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barangs';
    
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'stok',
        'jumlah',
        'satuan',
        'nama',
        'rak_id',
    ];
    
    public function rak()   
    {
        return $this->belongsTo(Rak::class);
    }

    public function barangKeluars()
    {
        return $this->hasMany(BarangKeluar::class);
    }

    public function stok()
    {
        return $this->hasOne(\App\Models\Stok::class);
    }
}