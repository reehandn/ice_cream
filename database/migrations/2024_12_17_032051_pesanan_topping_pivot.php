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
    Schema::create('pesanan_topping_pivot', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('pesanan_id');  // ID pesanan
        $table->unsignedBigInteger('topping_id');  // ID topping
        $table->foreign('pesanan_id')->references('pesanan_id')->on('pesanan')->onDelete('cascade');
        $table->foreign('topping_id')->references('id')->on('pesanan_topping')->onDelete('cascade');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_topping_pivot');
    }
};
