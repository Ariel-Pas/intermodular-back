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
        $ciclosGrupo = [
            'Informática'=> [
                'Administración de sistemas informáticos en red', 'Sistemas microinformáticos y redes', 'Desarrollo de aplicaciones web', 'Desarrollo de aplicaciones multiplataforma'
            ],
            'Administración' => [
                'Servicios comerciales', 'Actividades comerciales', 'Márketing y publicidad', 'Gestión administrativa', 'Administración y finanzas'
            ]
            ];

        foreach($ciclosGrupo as $grupo => $valor)
        {

            foreach($valor as $ciclo)
            {
                Ciclo::create(['nombre'=>$ciclo, 'campo'=>$grupo]);
            }

        }
    }
}
