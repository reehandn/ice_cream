<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PesananRasa;

class PesananRasaSeeder extends Seeder
{
    public function run()
    {
        PesananRasa::create([
            'rasa' => 'Strawberry',
            'stok' => 30,
            'harga' => '15000'
        ]);
    }
}
