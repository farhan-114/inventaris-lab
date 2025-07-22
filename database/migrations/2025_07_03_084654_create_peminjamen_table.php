<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
<<<<<<< HEAD
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->date('tanggal_pinjam');
            $table->string('nama_barang');
            $table->integer('jumlah');
=======
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<< HEAD
        Schema::dropIfExists('peminjamans');
=======
        Schema::dropIfExists('peminjamen');
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
    }
};
