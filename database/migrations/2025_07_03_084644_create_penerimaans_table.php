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
        Schema::create('penerimaans', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->date('tanggal_terima');
=======
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
            $table->timestamps();
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
        Schema::dropIfExists('penerimaans');
    }
<<<<<<< HEAD
};
=======
};
>>>>>>> 93414ca016bf79be1f68fc26e28200116851424f
