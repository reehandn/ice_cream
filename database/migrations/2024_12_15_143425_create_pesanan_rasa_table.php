<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan_rasa', function (Blueprint $table) {
            $table->id();
            $table->string('rasa'); // Nama rasa (Strawberry, Chocolate)
            $table->integer('stok'); // Stok untuk setiap rasa (bisa integer)
            $table->decimal('harga', 10, 2); // Harga per rasa
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan_rasa');
    }
};
