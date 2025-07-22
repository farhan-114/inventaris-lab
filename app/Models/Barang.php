<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
<<<<<<< HEAD
    use HasFactory;
=======
    protected $table = 'barangs';
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'kategori',
        'stok',
<<<<<<< HEAD
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
=======
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
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
}