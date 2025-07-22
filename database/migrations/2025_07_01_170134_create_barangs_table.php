<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
<<<<<<< HEAD
            $table->string('kategori')->nullable(); // opsional
=======
            $table->string('kategori')->nullable(); // opsional jika kamu punya tabel kategori sendiri
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
            $table->integer('stok')->default(0);
            $table->string('satuan');

            // Relasi ke rak
            $table->unsignedBigInteger('rak_id')->nullable();
            $table->foreign('rak_id')->references('id')->on('raks')->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};