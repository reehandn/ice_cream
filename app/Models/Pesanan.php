<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';

    protected $fillable = [
        'user_id', 'tipe_pengiriman', 'alamat_pengiriman', 
        'kategori', 'jumlah_rasa', 'total_harga', 
        'metode_pembayaran_id', 'bukti_pembayaran', 'status_pesanan'
    ];

    public function rasas()
    {
        return $this->belongsToMany(PesananRasa::class, 'pesanan_rasa', 'pesanan_id', 'id');
    }
    
    public function toppings()
    {
        return $this->belongsToMany(PesananTopping::class, 'pesanan_topping', 'pesanan_id', 'id');
    }

    // Relasi dengan tabel 'metode_pembayaran'
    public function metodePembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class);
    }

    // Relasi dengan pengguna (user)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
