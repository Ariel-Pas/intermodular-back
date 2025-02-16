<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empresa;
use App\Models\Categoria;
use App\Models\Servicio;
use App\Models\Centro;
use App\Models\Localidad;
use Flogti\SpanishCities\Models\Community;
use Illuminate\Support\Facades\DB;

// use App\Models\Community;

class EmpresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Community::all();
        //2 empresas por centro
        $centros = Centro::all();
        $municipios = Community::find(10)->towns;
        $rand = rand(1, $municipios->count() -1);
        foreach ($centros as $centro) {
            Empresa::factory()->hasAttached($centro, ['notas' => fake()->text(rand(30,50))])->count(4)->create(['town_id' => $municipios[rand(1, $municipios->count() -1)]->id]);
        }

        //asociar servicios y categorias
        $empresas = Empresa::all();
        $categorias = Categoria::with('servicios')->get();

        foreach ($empresas as $empresa){
            foreach($categorias as $categoria)
            {
                $posiblesServicios = $categoria->servicios->pluck('id')->toArray();
                $servicio = $posiblesServicios[array_rand($posiblesServicios)];
                DB::table('empresa_cat')->insert([
                    'empresa_id' => $empresa->id,
                    'categoria_id' => $categoria->id,
                    'servicio_id' => $servicio
                ]);
            }

        }
    }
}
