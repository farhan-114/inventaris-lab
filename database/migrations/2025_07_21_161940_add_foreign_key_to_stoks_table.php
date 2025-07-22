<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('stoks', function (Blueprint $table) {
            // Pastikan kolom sudah ada sebelum tambahkan foreign key
            if (Schema::hasColumn('stoks', 'barang_id')) {
                $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
            }
        });
    }

    public function down(): void
    {
        Schema::table('stoks', function (Blueprint $table) {
            $table->dropForeign(['barang_id']);
        });
    }
};