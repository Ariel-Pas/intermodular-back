<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empresa;
use App\Models\Centro;
use App\Models\Localidad;
// use Flogti\SpanishCities\Models\Community;
use App\Models\Localizacion\Community;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //2 empresas por centro
        $centros = Centro::all();
        $municipios = Community::find(10)->towns;
        $rand = rand(1, $municipios->count() -1);
        foreach ($centros as $centro) {
            Empresa::factory()->hasAttached($centro, ['notas' => fake()->text(rand(30,50))])->count(2)->create(['town_id' => $municipios[rand(1, $municipios->count() -1)]->id]);
        }
    }
}
