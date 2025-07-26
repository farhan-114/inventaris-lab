<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('penerimaans', function (Blueprint $table) {
            $table->foreignId('barang_id')->nullable()->constrained('barangs')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('penerimaans', function (Blueprint $table) {
            $table->dropForeign(['barang_id']);
            $table->dropColumn('barang_id');
        });
    }
};