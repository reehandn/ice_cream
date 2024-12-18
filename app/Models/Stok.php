<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
    use HasFactory;

    protected $table = 'stocks';

    protected $fillable = [
        'ice_cream_id', 'jumlah_stok',
    ];

    public function iceCream()
    {
        return $this->belongsTo(IceCream::class, 'ice_cream_id');
    }
}
