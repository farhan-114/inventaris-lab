<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->integer('jumlah');
<<<<<<< HEAD
            $table->text('deskripsi')->nullable();
            $table->date('tanggal_keluar')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

=======
            $table->text('deskripsi'); // kolom deskripsi/alasan barang keluar
            $table->date('tanggal_keluar')->default(now()); // default otomatis tanggal hari ini
            $table->timestamps();

            // Relasi ke tabel barangs
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang_keluars');
    }
<<<<<<< HEAD
};
=======
};
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
