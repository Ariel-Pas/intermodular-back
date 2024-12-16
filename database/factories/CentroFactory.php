<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Centro>
 */
class CentroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $nombre ='centro'.rand();
        return [
            'nombre' => $nombre,
            'codigo' => fake()->regexify('\d{5}'),
            'email' => $nombre.'@mail.com',
            'password' => fake()->password(),
            'direccion' => fake()->address(),
            'telefono' => fake()->phoneNumber(),
            'poblacion' => rand(1,30),
            'provincia' => rand(1,15)
        ];
    }
}
