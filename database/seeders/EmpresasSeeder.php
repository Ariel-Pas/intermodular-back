<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empresa;
use App\Models\Centro;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //2 empresas por centro
        $centros = Centro::all();

        foreach ($centros as $centro) {
            Empresa::factory()->hasAttached($centro, ['notas' => fake()->text(rand(30,50))])->count(2)->create();
        }
    }
}
