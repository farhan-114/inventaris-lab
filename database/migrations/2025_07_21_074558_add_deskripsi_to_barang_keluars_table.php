<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('barang_keluars', function (Blueprint $table) {
            $table->date('tanggal_keluar')->after('deskripsi');
        });
    }

    public function down(): void
    {
        Schema::table('barang_keluars', function (Blueprint $table) {
            $table->dropColumn('tanggal_keluar');
        });
    }
};