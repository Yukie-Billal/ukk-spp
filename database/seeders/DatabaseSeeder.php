<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kelas;
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

        Spp::factory(3)->create();
        Kelas::factory()->create([
            'nama_kelas' => 'A'
        ]);
        Kelas::factory()->create([
            'nama_kelas' => 'B'
        ]);
        Kelas::factory()->create([
            'nama_kelas' => 'C'
        ]);
        Siswa::factory()->create([
            'nisn' => '111',
            'nis' => '111',
            'password' => bcrypt('111'),
        ]);
        Petugas::factory()->create([
            'username' => '123',
            'password' => bcrypt('123'),           
            'role_id' => 2,
        ]);
        Petugas::factory()->create([
            'username' => '321',
            'password' => bcrypt('123'),            
            'role_id' => 1,
        ]);
    }
}
