<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rasa extends Model
{
    use HasFactory;

    protected $table = 'rasa';

    protected $fillable = [
        'nama_rasa',
        'stok',
        'harga',
    ];

    // Relasi dengan model Order (jika diperlukan)
    public function orders()
    {
        return $this->hasMany(Order::class, 'rasa_1');
    }
}
