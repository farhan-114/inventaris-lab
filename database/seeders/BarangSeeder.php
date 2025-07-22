<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Barang;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        // Contoh data dummy
        Barang::create([
            'kode_barang' => 'BRG001',
            'nama_barang' => 'Arduino Uno',
            'kategori'    => 'Elektronik',
            'stok'        => 10,
            'satuan'      => 'Pcs',
            'rak_id'      => 1, // pastikan ada rak dengan id=1 atau sesuaikan
        ]);

        Barang::create([
            'kode_barang' => 'BRG002',
            'nama_barang' => 'Sensor Suhu',
            'kategori'    => 'Sensor',
            'stok'        => 15,
            'satuan'      => 'Pcs',
            'rak_id'      => 1,
        ]);

        Barang::create([
            'kode_barang' => 'BRG003',
            'nama_barang' => 'Jumper Wire',
            'kategori'    => 'Kabel',
            'stok'        => 50,
            'satuan'      => 'Pack',
            'rak_id'      => 2,
        ]);
    }
}