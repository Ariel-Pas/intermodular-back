<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Formulario;

class FormularioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formularioEmpresa= new Formulario();
        $formularioEmpresa->id= 1;
        $formularioEmpresa->nombre= 'Empresas';
        $formularioEmpresa->descripcion = 'Formulario para calificar a un practicante';
        $formularioEmpresa->tipo= 'empresa';
        $formularioEmpresa->save(); // ← IMPORTANTE: Guarda en la base de datos

        $formularioAlumno= new Formulario();
        $formularioAlumno->id= 2;
        $formularioAlumno->nombre= 'Alumnos';
        $formularioAlumno->descripcion = 'Formulario para calificar a una empresa';
        $formularioAlumno->tipo= 'alumno';
        $formularioAlumno->save(); 

    }
}
