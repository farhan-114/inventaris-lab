<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('stoks', function (Blueprint $table) {
            if (!Schema::hasColumn('stoks', 'barang_id')) {
                $table->unsignedBigInteger('barang_id')->nullable()->after('id');
            }
        });
    }
    public function down()
    {
        Schema::table('stoks', function (Blueprint $table) {
            $table->dropForeign(['barang_id']);
            $table->dropColumn('barang_id');
        });
    }
};