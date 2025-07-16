<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rak extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}