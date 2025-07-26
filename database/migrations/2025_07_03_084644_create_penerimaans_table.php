<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
return new class extends Migration
{
    /**
     * Run the migrations.
     */
=======
return new class extends Migration {
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
    public function up(): void
    {
        Schema::create('penerimaans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->date('tanggal_terima');
            $table->timestamps();
        });
    }

<<<<<<< HEAD
    /**
     * Reverse the migrations.
     */
=======
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
    public function down(): void
    {
        Schema::dropIfExists('penerimaans');
    }
<<<<<<< HEAD
};
=======
};
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
