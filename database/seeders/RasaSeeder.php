<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RasaSeeder extends Seeder
{
    public function run(): void
    {
        // Data rasa dan harga
        $rasaData = [
            ['nama_rasa' => 'Chocolate', 'stok' => 100, 'harga' => 20000],
            ['nama_rasa' => 'Vanilla', 'stok' => 100, 'harga' => 15000],
            ['nama_rasa' => 'Strawberry', 'stok' => 100, 'harga' => 18000],
            ['nama_rasa' => 'Mint', 'stok' => 100, 'harga' => 25000],
            ['nama_rasa' => 'Chocomint', 'stok' => 100, 'harga' => 22000],
            ['nama_rasa' => 'Nutella', 'stok' => 100, 'harga' => 24000],
            ['nama_rasa' => 'Dark Chocolate', 'stok' => 100, 'harga' => 26000],
        ];

        // Masukkan data ke tabel 'rasa'
        DB::table('rasa')->insert($rasaData);
    }
}
