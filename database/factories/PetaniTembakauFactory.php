<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PetaniTembakau>
 */
class PetaniTembakauFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_petani' => fake()->unique()->numberBetween(1,5),
            'nama_petani' => fake()->name(),
            'username_petani' => fake()->userName(),
            'pw_petani' => fake()->password(),
            'email_petani' => fake()->email(),
            'id_jenis_kelamin' => fake()->numberBetween(1,2),
            'alamat_petani' => fake()->address(),
            'id_kecamatan' => fake()->numberBetween(1,3),
            'telp_petani' => fake()->phoneNumber(),
            'noktp_petani' => fake()->unique()->randomNumber()
        ];
    }
}
