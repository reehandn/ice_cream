<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan_topping', function (Blueprint $table) {
            $table->id();
            $table->string('topping'); // Nama topping (Chocolate Chips, Sprinkles)
            $table->integer('stok'); // Stok topping (bisa integer)
            $table->decimal('harga', 10, 2); // Harga per topping
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan_topping');
    }
};
