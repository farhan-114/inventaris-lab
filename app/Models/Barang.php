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
<<<<<<< HEAD
=======
        'jumlah',
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
        'satuan',
        'nama',
        'rak_id',
    ];
<<<<<<< HEAD
    
    public function rak()   
    {
        return $this->belongsTo(Rak::class);
    }

    public function barangKeluars()
    {
        return $this->hasMany(BarangKeluar::class);
    }
}
=======

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
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
