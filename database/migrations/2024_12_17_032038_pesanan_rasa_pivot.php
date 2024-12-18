<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan_rasa_pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesanan_id');
            $table->unsignedBigInteger('rasa_id');
            $table->foreign('pesanan_id')->references('pesanan_id')->on('pesanan')->onDelete('cascade');
            $table->foreign('rasa_id')->references('id')->on('pesanan_rasa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan_rasa_pivot');
    }
};