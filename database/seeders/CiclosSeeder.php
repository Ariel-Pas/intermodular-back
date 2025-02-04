<?php

namespace Database\Seeders;

use App\Models\AreasCiclo;
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
                'Gestión administrativa', 'Administración y finanzas'
            ],
            'Comercio' => [
                'Servicios comerciales',
                'Actividades comerciales',
                'Márketing y publicidad'
            ]
            ];

        foreach($ciclosGrupo as $grupo => $valor)
        {
            $area = AreasCiclo::create(['nombre' => $grupo]);

            foreach($valor as $ciclo)
            {
                Ciclo::create(['nombre'=>$ciclo, 'areasciclo_id'=>$area->id]);
            }

        }
    }
}
