<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Petugas;
use App\Models\Siswa;
use App\Models\Spp;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Role::create([
            'kode_role' => 'Admin',
            'nama_role' => 'admin',
        ]);
        Role::create([
            'kode_role' => 'Petugas',
            'nama_role' => 'petugas',
        ]);
        Role::create([
            'kode_role' => 'Siswa',
            'nama_role' => 'siswa',
        ]);
        $this->call([
            BulanSeeder::class,
        ]);
        Spp::factory(3)->create();
        Kelas::factory()->create([
            'nama_kelas' => '10 RPL A'
        ]);
        Kelas::factory()->create([
            'nama_kelas' => '10 RPL B'
        ]);
        Kelas::factory()->create([
            'nama_kelas' => '10 RPL C'
        ]);
        Petugas::factory()->create([
            'username' => 'Petugas',
            'password' => bcrypt('123'),
            'role_id' => 2,
        ]);
        Petugas::factory()->create([
            'username' => 'Admin',
            'password' => bcrypt('123'),            
            'role_id' => 1,
        ]);
        Siswa::factory(10)->create();
        Siswa::factory()->create([
            'nisn' => '1234567',
            'nis' => '1',
            'nama' => 'Yukie M Billal',
            'spp_id' => 1,
        ]);
        // Pembayaran::factory(12)->create();
    }
}
