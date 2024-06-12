<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SmartphoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('smartphones')->insert([
            ['nama_smartphone' => 'Smartphone A', 'harga' => 3000000, 'penyimpanan' => 64, 'kualitas_kamera' => 8, 'kecepatan_prosesor' => 2.5, 'waktu_pengisian' => 90, 'berat' => 180, 'garansi' => 24],
            ['nama_smartphone' => 'Smartphone B', 'harga' => 2500000, 'penyimpanan' => 32, 'kualitas_kamera' => 6, 'kecepatan_prosesor' => 2.0, 'waktu_pengisian' => 120, 'berat' => 200, 'garansi' => 12],
            ['nama_smartphone' => 'Smartphone C', 'harga' => 4000000, 'penyimpanan' => 128, 'kualitas_kamera' => 12, 'kecepatan_prosesor' => 3.0, 'waktu_pengisian' => 60, 'berat' => 170, 'garansi' => 24],
            ['nama_smartphone' => 'Smartphone D', 'harga' => 3500000, 'penyimpanan' => 64, 'kualitas_kamera' => 10, 'kecepatan_prosesor' => 2.8, 'waktu_pengisian' => 80, 'berat' => 190, 'garansi' => 18],
            ['nama_smartphone' => 'Smartphone E', 'harga' => 2800000, 'penyimpanan' => 64, 'kualitas_kamera' => 8, 'kecepatan_prosesor' => 2.2, 'waktu_pengisian' => 100, 'berat' => 185, 'garansi' => 12],
        ]);
    }
}
