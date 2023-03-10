<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Siswa>
 */
class SiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nisn' => fake()->unique()->numerify('##########'),
            'nis' => fake()->unique()->numerify('########'),
            'nama' => fake()->name(),
            'kelas_id' => mt_rand(1,5),
            'alamat' => fake()->address(),
            'no_telp' => fake()->phoneNumber(),
            'spp_id' => mt_rand(1,3),
        ];
    }
}
