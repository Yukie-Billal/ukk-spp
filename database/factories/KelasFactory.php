<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Kelas>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_kelas' => mt_rand(10,12) . '' .fake()->bothify('?'),
            'kompetensi_keahlian' => 'Rekayasa perangkat lunak',
        ];
    }
}
