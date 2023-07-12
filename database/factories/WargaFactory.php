<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\warga>
 */
class WargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'nama' => fake()->name(),
            'nik' => fake()->unique()->nik(),
            'jk' =>fake()->randomKey(
                [
                    'Laki-Laki' => 1,
                    'Perempuan' => 2
                ]),
            'tempat_lahir' => fake()->city(),
            'tanggal_lahir' =>fake()->dateTime(),
            'agama' => fake()->randomKey(
                [
                    'Islam' => 1,
                    'Kristen' => 2,
                    'Katolik' => 3,
                    'Buddha' => 4,
                    'Hindu' => 5,
                    'Konghucu' => 6,
                ]),
            'pendidikan' => fake()->randomKey(
                [
                    'Tamat SD' => 1,
                    'SLTA' => 2,
                    'SLTP' => 3,
                    'Diploma IV/Strata I' => 4,
                    'Strata II' => 5,
                ]),
            'jenis_pekerjaan' => fake()->jobTitle(),
            'otoken' => fake()->unique()->bothify('?????-#####')


        ];
    }
}
