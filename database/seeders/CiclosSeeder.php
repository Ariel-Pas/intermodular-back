<?php

namespace Database\Seeders;

use App\Models\Ciclo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CiclosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $ciclos = ['Administración de sistemas informáticos en red', 'Sistemas microinformáticos y redes', 'Desarrollo de aplicaciones web', 'Desarrollo de aplicaciones multiplataforma', 'Servicios comerciales', 'Actividades comerciales', 'Márketing y publicidad', 'Gestión administrativa', 'Administración y finanzas'];

        foreach($ciclos as $ciclo)
        {
            Ciclo::create(['nombre'=>$ciclo]);
        }
    }
}
