<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PesananTopping;

class PesananToppingSeeder extends Seeder
{
    public function run()
    {
        PesananTopping::create([
            'topping' => 'Chocolate Chips',
            'stok' => 30,
            'harga' => '15000'
        ]);
    }
}
