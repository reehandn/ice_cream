<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id(); // ID pesanan
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Menghubungkan pesanan dengan tabel users
            $table->string('tipe_pengiriman'); // Pickup atau Delivery
            $table->string('alamat_pengiriman')->nullable(); // Hanya diperlukan jika tipe pengiriman 'Delivery'
            $table->string('kategori'); // Cone, Cup, Bread
            
            // Foreign key ke tabel rasa
            $table->foreignId('rasa_1')->nullable()->constrained('rasa')->onDelete('set null');
            $table->foreignId('rasa_2')->nullable()->constrained('rasa')->onDelete('set null');
            $table->foreignId('rasa_3')->nullable()->constrained('rasa')->onDelete('set null');
            
            $table->decimal('total_harga', 10, 2)->default(0); // Total harga pesanan
            $table->enum('status_pesanan', ['pending', 'ready', 'completed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
