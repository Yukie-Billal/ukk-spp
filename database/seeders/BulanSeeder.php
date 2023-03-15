<?php

namespace Database\Seeders;

use App\Models\Bulan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BulanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bulan::create([
            'nama_bulan' => 'Januari',
        ]);
        Bulan::create([
            'nama_bulan' => 'Febuari',
        ]);
        Bulan::create([
            'nama_bulan' => 'Maret',
        ]);
        Bulan::create([
            'nama_bulan' => 'April',
        ]);
        Bulan::create([
            'nama_bulan' => 'Mei',
        ]);
        Bulan::create([
            'nama_bulan' => 'Juni',
        ]);
        Bulan::create([
            'nama_bulan' => 'Juli',
        ]);
        Bulan::create([
            'nama_bulan' => 'Agustus',
        ]);
        Bulan::create([
            'nama_bulan' => 'September',
        ]);
        Bulan::create([
            'nama_bulan' => 'Oktober',
        ]);
        Bulan::create([
            'nama_bulan' => 'November',
        ]);
        Bulan::create([
            'nama_bulan' => 'Desember',
        ]);
    }
}
