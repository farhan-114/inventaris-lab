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
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
            $table->integer('jumlah');
            $table->string('ruangan');
            $table->date('tanggal');
            $table->text('keterangan')->nullable();
=======
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_peminjam');
            $table->date('tanggal_pinjam');
            $table->string('nama_barang');
            $table->integer('jumlah');
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
            $table->timestamps();
        });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
<<<<<<< HEAD
        Schema::dropIfExists('peminjamen');
=======
        Schema::dropIfExists('peminjamans');
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
    }
};
