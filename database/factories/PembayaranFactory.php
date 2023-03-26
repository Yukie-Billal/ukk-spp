<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'petugas_id' => 1,
            'nisn' => 1234567,
            'tgl_bayar' => date('Y-') . date('m')-1 . date('-d'),
            'bulan_dibayar' => fake()->unique()->randomElement([1,2,3,4,5,6,7,8,9,10,11,12]),
            'tahun_dibayar' => date('Y'),
            'spp_id' => 1,
            'jumlah_bayar' => 210000
        ];
    }
}
