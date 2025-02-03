<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categoria;


class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Categoria::create(['id' => 1, 'nombre' => 'Programación web']);
        Categoria::create(['id' => 2, 'nombre' => 'Programación multimedia']);
        Categoria::create(['id' => 3, 'nombre' => 'Administración de sistemas']);
        Categoria::create(['id' => 4, 'nombre' => 'Administración de empresas']);
    }
}
