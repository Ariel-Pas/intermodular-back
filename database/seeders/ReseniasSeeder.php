<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Resenia;

class ReseniasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $resenias = [
            'Buena experiencia con el practicante.',
            5,
            'Podría mejorar su comunicación con el equipo.',
            4,
            'Ha demostrado gran iniciativa en sus tareas.',
            3,
            'Cuenta con buenas habilidades técnicas.',
            5,
            'Cumplió con los objetivos planteados.',

            3,
            'Se podrían mejorar los canales de comunicación.',
            5,
            'Las tareas fueron adecuadas para la formación.',
            5,
            4,
            'El ambiente de trabajo fue muy agradable.',
            'Hubo algunas dificultades en la comunicación con el tutor.',
            4,
            'Sugiero incluir más oportunidades de aprendizaje.',
        ];

        foreach ($resenias as $index => $respuesta) {
            $resenia = new Resenia();
            $resenia->id = $index + 1;
            $resenia->respuesta = $respuesta;
            $resenia->fecha = null;
            $resenia->pregunta_id = $index + 1;
            $resenia->formulario_id = ($index < 10) ? 1 : 2;

            // La primera empresa (ID 1) para las primeras 10 preguntas, otra empresa (ID 2) para las demás

            $empresa_id = ($index < 10) ? 1 : 2;
            $resenia->empresa_id = $empresa_id;

            $resenia->centro_id = 2;
            $resenia->save();
        }
    }
}
