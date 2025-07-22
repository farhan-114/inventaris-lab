<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('barang_keluars', function (Blueprint $table) {
        $table->date('tanggal_keluar')->nullable()->after('jumlah');
    });
}

public function down()
{
    Schema::table('barang_keluars', function (Blueprint $table) {
        $table->dropColumn('tanggal_keluar');
    });
}
};
