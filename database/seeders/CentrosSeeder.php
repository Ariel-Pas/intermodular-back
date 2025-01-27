<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Centro;
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
        Centro::factory()->count(6)->create(['town_id' => $municipios[rand(1, $municipios->count() -1)]->id]);
    }
}
