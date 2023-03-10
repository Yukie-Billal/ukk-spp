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

        User::factory()->create([
            'username' => 'Admin',
            'password' => bcrypt('123'),
            'role_id' => 1
        ]);
        User::factory()->create([
            'username' => 'Petugas',
            'password' => bcrypt('123'),
            'role_id' => 2
        ]);
        User::factory()->create([
            'username' => '111',
            'password' => bcrypt('111'),
            'role_id' => 3
        ]);
        Spp::factory(3)->create();
        Kelas::factory(5)->create();
        Siswa::factory()->create([
            'nisn' => '111',
            'nis' => '111',
            'user_id' => 3
        ]);
        // Petugas::factory(10)->create();
        Petugas::factory()->create([
            'username' => 'Petugas',
            'password' => bcrypt('123'),
            'user_id' => 2
        ]);
        Petugas::factory()->create([
            'username' => 'Admin',
            'password' => bcrypt('123'),
            'user_id' => 1
        ]);
    }
}
