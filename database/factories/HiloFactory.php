<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hilo>
 */
class HiloFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->sentence(),
            'descripcion' => fake()->paragraph(),
            'user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
