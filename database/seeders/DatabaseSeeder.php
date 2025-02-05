<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Flogti\SpanishCities\Database\Seeders\CommunitiesTableSeeder;
use Flogti\SpanishCities\Database\Seeders\ProvincesTableSeeder;
use Flogti\SpanishCities\Database\Seeders\TownsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(CommunitiesTableSeeder::class);
        $this->call(ProvincesTableSeeder::class);
        $this->call(TownsTableSeeder::class);

        $this->call(CiclosSeeder::class);
        $this->call(CentrosSeeder::class);
        $this->call(UsuariosSeeder::class);
        $this->call(EmpresasSeeder::class);

        $this->call(FormularioSeeder::class);
        $this->call(PreguntasSeeder::class);
        $this->call(FormularioPreguntaSeeder::class);

        $this->call(SolicitudesSeeder::class);

        /* User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */
    }
}
