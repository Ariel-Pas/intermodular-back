<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        //obtener posibles municipios

        $nombre = fake()->company();
        return [
           'nombre'=> $nombre,
            'cif' =>fake()->regexify('/[0-9]{8}[A-Z]/'),
            'descripcion' => fake()->text(100),
            'email' => $nombre.'@mail.com',
            'direccion' => fake()->address(),
            'coordX' => rand(0,100),
            'coordY' => rand(0,100),
            'horario_manana' => '9:00 - 13:00',
            'horario_tarde' => '14:00 - 18:00',
            'finSemana' => fake()->boolean(20),
            'vacantes' => rand(1,7),
            'puntuacion_profesor' => rand(1,10),
            'puntuacion_alumno' => rand(1,10),
            'telefono' => fake()->phoneNumber()
        ];
    }
}
