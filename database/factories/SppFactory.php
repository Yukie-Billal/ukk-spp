<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spp>
 */
class SppFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tahun' => mt_rand(2020,2024),
            'nominal' => 2 . mt_rand(1,4) . 0000,
        ];
    }
}
