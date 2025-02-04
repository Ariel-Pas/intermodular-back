<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Centro;
use App\Models\Ciclo;
use Flogti\SpanishCities\Models\Community;
class CentrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipios = Community::find(10)->towns;
        $rand = rand(1, $municipios->count() -1);
        $ciclos = Ciclo::all();
        $randCiclo = rand(1, $ciclos->count() -1);
        
        Centro::factory()->count(6)->create(['town_id' => $municipios[rand(1, $municipios->count() -1)]->id]);

        Centro::all()->each(function ($centro) use($ciclos) {
            $centro->ciclos()->attach(
                $ciclos->random(rand(1,3))->pluck('id')->toArray()
            );
        });


    }
}
