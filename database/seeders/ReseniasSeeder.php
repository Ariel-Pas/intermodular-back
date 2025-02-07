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
            'Mostró un alto nivel de responsabilidad.',
            'Podría mejorar su comunicación con el equipo.',
            'Siempre fue puntual en sus actividades.',
            'Ha demostrado gran iniciativa en sus tareas.',
            'Tiene una actitud muy positiva ante los desafíos.',
            'Cuenta con buenas habilidades técnicas.',
            'Sin duda, lo recomendaría para futuras oportunidades.',
            'Se integró muy bien con el equipo de trabajo.',
            'Cumplió con los objetivos planteados.',
            'Fue una gran experiencia en la empresa.',
            'Se podrían mejorar los canales de comunicación.',
            'El trato del equipo de trabajo fue excelente.',
            'Las tareas fueron adecuadas para la formación.',
            'Siempre me sentí acompañado y guiado.',
            'Definitivamente recomendaría esta empresa.',
            'El ambiente de trabajo fue muy agradable.',
            'Hubo algunas dificultades en la comunicación con el tutor.',
            'Las instalaciones y recursos eran adecuados.',
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
