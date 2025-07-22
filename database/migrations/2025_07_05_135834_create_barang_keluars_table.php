<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
return new class extends Migration {
=======
return new class extends Migration
{
    /**
     * Run the migrations.
     */
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
    public function up(): void
    {
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->integer('jumlah');
<<<<<<< HEAD
            $table->text('deskripsi'); // kolom deskripsi/alasan barang keluar
            $table->date('tanggal_keluar')->default(now()); // default otomatis tanggal hari ini
            $table->timestamps();

            // Relasi ke tabel barangs
=======
            $table->string('keterangan')->nullable();
            $table->timestamps();

>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

<<<<<<< HEAD
=======
    /**
     * Reverse the migrations.
     */
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
    public function down(): void
    {
        Schema::dropIfExists('barang_keluars');
    }
<<<<<<< HEAD
};
=======
};
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
