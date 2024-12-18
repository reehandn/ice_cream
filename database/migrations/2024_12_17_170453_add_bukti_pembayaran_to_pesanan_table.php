<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('pesanan', function (Blueprint $table) {
        $table->string('bukti_pembayaran')->nullable()->after('metode_pembayaran_id');
    });
}

public function down()
{
    Schema::table('pesanan', function (Blueprint $table) {
        $table->dropColumn('bukti_pembayaran');
    });
}

};
