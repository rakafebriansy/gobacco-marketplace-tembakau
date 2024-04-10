<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JenisPengujian>
 */
class JenisPengujianFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_pengujian' => fake()->unique()->numberBetween(1,5),
            'jenis_pengujian' => fake()->sentence(),
            'id_pemerintah' => fake()->numberBetween(1,3)
        ];
    }
}
