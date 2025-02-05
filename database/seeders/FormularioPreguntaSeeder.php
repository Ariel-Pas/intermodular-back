<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Formulario;
use App\Models\Pregunta;

class FormularioPreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formularioEmpresa = Formulario::find(1);
        $preguntasEmpresa = Pregunta::whereIn('titulo', [
            '¿Cómo ha sido el desempeño del practicante?',
            '¿Cómo evaluaría su nivel de responsabilidad?',
            '¿Qué aspectos podría mejorar el practicante?',
            '¿Cómo calificaría la puntualidad del practicante?',
            '¿El practicante ha mostrado iniciativa en sus tareas?',
            '¿Cómo ha sido su actitud frente a los desafíos?',
            '¿Qué habilidades técnicas ha demostrado el practicante?',
            '¿Recomendaría a este practicante para futuras oportunidades?',
            '¿Cómo ha sido la interacción del practicante con el equipo de trabajo?',
            '¿Considera que el practicante ha cumplido con sus objetivos?'
        ])->get();
        // Relacionar las preguntas del alumno con el formulario 1
        $formularioEmpresa->preguntas()->attach($preguntasEmpresa);



        $formularioAlumno = Formulario::find(2);
        $preguntasAlumno = Pregunta::whereIn('titulo', [
            '¿Cómo calificaría su experiencia en la empresa?',
            '¿Qué aspectos mejoraría de la empresa?',
            '¿Cómo ha sido el trato recibido por parte del equipo de trabajo?',
            '¿Las tareas asignadas fueron adecuadas para su formación?',
            '¿Se sintió acompañado y guiado durante la práctica?',
            '¿Recomendaría esta empresa a otros estudiantes?',
            '¿Qué le pareció el ambiente de trabajo?',
            '¿Hubo dificultades en la comunicación con su tutor de empresa?',
            '¿Las instalaciones y recursos de la empresa fueron adecuados?',
            '¿Qué sugerencias haría para mejorar la experiencia del próximo practicante?'
        ])->get();
        // Relacionar las preguntas del alumno con el formulario 2
        $formularioAlumno->preguntas()->attach($preguntasAlumno);
    }
}
