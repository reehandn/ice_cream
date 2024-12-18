<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'order';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'user_id',
        'tipe_pengiriman',
        'alamat_pengiriman',
        'kategori',
        'rasa_1',
        'rasa_2',
        'rasa_3',
        'total_harga',
        'status_pesanan',
    ];

    /**
     * Relasi dengan tabel User
     * Satu Order dimiliki oleh satu User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke tabel Rasa
     * Kolom rasa_1
     */
    public function rasa1()
    {
        return $this->belongsTo(Rasa::class, 'rasa_1', 'id');
    }

    /**
     * Relasi ke tabel Rasa
     * Kolom rasa_2
     */
    public function rasa2()
    {
        return $this->belongsTo(Rasa::class, 'rasa_2', 'id');
    }

    /**
     * Relasi ke tabel Rasa
     * Kolom rasa_3
     */
    public function rasa3()
    {
        return $this->belongsTo(Rasa::class, 'rasa_3', 'id');
    }

    /**
     * Fungsi untuk mengambil semua data rasa terkait
     * Mempermudah akses ke semua relasi rasa
     */
    public function getAllRasa()
    {
        return collect([
            $this->rasa1,
            $this->rasa2,
            $this->rasa3,
        ])->filter(); // Menghapus null jika ada
    }
}
