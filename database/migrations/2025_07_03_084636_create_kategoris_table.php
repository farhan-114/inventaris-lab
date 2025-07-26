<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

<<<<<<< HEAD
return new class extends Migration {
    public function up(): void
=======
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
>>>>>>> e7f83e930b536a4ebe305d3e34eec83f69936ad2
    {
        Schema::create('kategoris', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kategoris');
    }
};