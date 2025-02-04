<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pregunta;

class PreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $preguntasEmpresa = [
            ['titulo' => '¿Cómo ha sido el desempeño del practicante?', 'tipo' => 'text', 'orden' => 1],
            ['titulo' => '¿Cómo evaluaría su nivel de responsabilidad?', 'tipo' => 'estrellas', 'orden' => 2],
            ['titulo' => '¿Qué aspectos podría mejorar el practicante?', 'tipo' => 'textarea', 'orden' => 3],
            ['titulo' => '¿Cómo calificaría la puntualidad del practicante?', 'tipo' => 'estrellas', 'orden' => 4],
            ['titulo' => '¿El practicante ha mostrado iniciativa en sus tareas?', 'tipo' => 'text', 'orden' => 5],
            ['titulo' => '¿Cómo ha sido su actitud frente a los desafíos?', 'tipo' => 'estrellas', 'orden' => 6],
            ['titulo' => '¿Qué habilidades técnicas ha demostrado el practicante?', 'tipo' => 'textarea', 'orden' => 7],
            ['titulo' => '¿Recomendaría a este practicante para futuras oportunidades?', 'tipo' => 'estrellas', 'orden' => 8],
            ['titulo' => '¿Cómo ha sido la interacción del practicante con el equipo de trabajo?', 'tipo' => 'textarea', 'orden' => 9],
            ['titulo' => '¿Considera que el practicante ha cumplido con sus objetivos?', 'tipo' => 'text', 'orden' => 10],
        ];

        $preguntasAlumno = [
            ['titulo' => '¿Cómo calificaría su experiencia en la empresa?', 'tipo' => 'estrellas', 'orden' => 1],
            ['titulo' => '¿Qué aspectos mejoraría de la empresa?', 'tipo' => 'textarea', 'orden' => 2],
            ['titulo' => '¿Cómo ha sido el trato recibido por parte del equipo de trabajo?', 'tipo' => 'estrellas', 'orden' => 3],
            ['titulo' => '¿Las tareas asignadas fueron adecuadas para su formación?', 'tipo' => 'text', 'orden' => 4],
            ['titulo' => '¿Se sintió acompañado y guiado durante la práctica?', 'tipo' => 'estrellas', 'orden' => 5],
            ['titulo' => '¿Recomendaría esta empresa a otros estudiantes?', 'tipo' => 'estrellas', 'orden' => 6],
            ['titulo' => '¿Qué le pareció el ambiente de trabajo?', 'tipo' => 'text', 'orden' => 7],
            ['titulo' => '¿Hubo dificultades en la comunicación con su tutor de empresa?', 'tipo' => 'textarea', 'orden' => 8],
            ['titulo' => '¿Las instalaciones y recursos de la empresa fueron adecuados?', 'tipo' => 'estrellas', 'orden' => 9],
            ['titulo' => '¿Qué sugerencias haría para mejorar la experiencia del próximo practicante?', 'tipo' => 'textarea', 'orden' => 10],
        ];

        // Insertar preguntas de la empresa
        foreach ($preguntasEmpresa as $pregunta) {
            Pregunta::create([
                'titulo' => $pregunta['titulo'],
                'tipo' => $pregunta['tipo'],
                'orden' => $pregunta['orden'],
            ]);
        }

        // Insertar preguntas del alumno
        foreach ($preguntasAlumno as $pregunta) {
            Pregunta::create([
                'titulo' => $pregunta['titulo'],
                'tipo' => $pregunta['tipo'],
                'orden' => $pregunta['orden'],
            ]);
        }
    }
}
