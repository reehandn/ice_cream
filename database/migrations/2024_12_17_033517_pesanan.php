<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('pesanan_id');
            $table->string('tipe_pengiriman'); // Pickup atau Delivery
            $table->string('alamat_pengiriman')->nullable(); // Hanya diperlukan jika tipe pengiriman 'Delivery'
            $table->string('kategori'); // Cone, Cup, Bread
            $table->integer('jumlah_rasa'); // Jumlah rasa yang dipilih
            $table->decimal('total_harga', 10, 2)->default(0); // Total harga pesanan
            $table->enum('status_pesanan', ['pending', 'ready', 'completed'])->default('pending');
            $table->timestamps();
            
            // Menambahkan kolom user_id sebagai foreign key
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            // Menambahkan foreign key untuk metode pembayaran
            $table->unsignedBigInteger('metode_pembayaran_id');
            $table->foreign('metode_pembayaran_id')->references('id')->on('metode_pembayaran')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};

