<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Solicitud;

class SolicitudesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $solicitud1 = new Solicitud();
        $solicitud1->nombreEmpresa = 'Empresa Alpha';
        $solicitud1->actividad = 'Tecnología';
        $solicitud1->cif = 'B12345678';
        $solicitud1->provincia = 'Madrid';
        $solicitud1->localidad = 'Madrid';
        $solicitud1->email = 'contacto@empresaalpha.com';
        $solicitud1->titularidad = 'Privada';
        $solicitud1->horario_comienzo = '08:00';
        $solicitud1->horario_fin = '17:00';
        $solicitud1->centro_id = 1;
        $solicitud1->empresa_id = 1;
        $solicitud1->save();

        $solicitud2 = new Solicitud();
        $solicitud2->nombreEmpresa = 'Beta Solutions';
        $solicitud2->actividad = 'Consultoría';
        $solicitud2->cif = 'C87654321';
        $solicitud2->provincia = 'Barcelona';
        $solicitud2->localidad = 'Barcelona';
        $solicitud2->email = 'info@betasolutions.com';
        $solicitud2->titularidad = 'Pública';
        $solicitud2->horario_comienzo = '09:00';
        $solicitud2->horario_fin = '18:00';
        $solicitud2->centro_id = 2;
        $solicitud2->empresa_id = 2;
        $solicitud2->save();

        $solicitud3 = new Solicitud();
        $solicitud3->nombreEmpresa = 'Gamma Corp';
        $solicitud3->actividad = 'Finanzas';
        $solicitud3->cif = 'D11223344';
        $solicitud3->provincia = 'Valencia';
        $solicitud3->localidad = 'Valencia';
        $solicitud3->email = 'contact@gammacorp.com';
        $solicitud3->titularidad = 'Privada';
        $solicitud3->horario_comienzo = '08:30';
        $solicitud3->horario_fin = '17:30';
        $solicitud3->centro_id = 3;
        $solicitud3->empresa_id = 3;
        $solicitud3->save();

        $solicitud4 = new Solicitud();
        $solicitud4->nombreEmpresa = 'Delta Innovación';
        $solicitud4->actividad = 'Educación';
        $solicitud4->cif = 'E55667788';
        $solicitud4->provincia = 'Sevilla';
        $solicitud4->localidad = 'Sevilla';
        $solicitud4->email = 'contacto@deltainnova.com';
        $solicitud4->titularidad = 'Pública';
        $solicitud4->horario_comienzo = '07:00';
        $solicitud4->horario_fin = '15:00';
        $solicitud4->centro_id = 4;
        $solicitud4->empresa_id = 4;
        $solicitud4->save();

        $solicitud5 = new Solicitud();
        $solicitud5->nombreEmpresa = 'Epsilon Tech';
        $solicitud5->actividad = 'Desarrollo de Software';
        $solicitud5->cif = 'F99887766';
        $solicitud5->provincia = 'Bilbao';
        $solicitud5->localidad = 'Bilbao';
        $solicitud5->email = 'info@epsilontec.com';
        $solicitud5->titularidad = 'Privada';
        $solicitud5->horario_comienzo = '10:00';
        $solicitud5->horario_fin = '19:00';
        $solicitud5->centro_id = 5;
        $solicitud5->empresa_id = 5;
        $solicitud5->save();

        $solicitud6 = new Solicitud();
        $solicitud6->nombreEmpresa = 'Zeta Construcciones';
        $solicitud6->actividad = 'Construcción';
        $solicitud6->cif = 'G22334455';
        $solicitud6->provincia = 'Málaga';
        $solicitud6->localidad = 'Málaga';
        $solicitud6->email = 'contacto@zetaconstrucciones.com';
        $solicitud6->titularidad = 'Privada';
        $solicitud6->horario_comienzo = '06:00';
        $solicitud6->horario_fin = '14:00';
        $solicitud6->centro_id = 6;
        $solicitud6->empresa_id = 6;
        $solicitud6->save();

        $solicitud7 = new Solicitud();
        $solicitud7->nombreEmpresa = 'Omega Marketing';
        $solicitud7->actividad = 'Marketing y Publicidad';
        $solicitud7->cif = 'H11224433';
        $solicitud7->provincia = 'Zaragoza';
        $solicitud7->localidad = 'Zaragoza';
        $solicitud7->email = 'info@omegamarketing.com';
        $solicitud7->titularidad = 'Pública';
        $solicitud7->horario_comienzo = '08:00';
        $solicitud7->horario_fin = '17:00';
        $solicitud7->centro_id = 7;
        $solicitud7->empresa_id = 7;
        $solicitud7->save();

        $solicitud8 = new Solicitud();
        $solicitud8->nombreEmpresa = 'Lambda IT';
        $solicitud8->actividad = 'Desarrollo Web';
        $solicitud8->cif = 'I55443322';
        $solicitud8->provincia = 'Granada';
        $solicitud8->localidad = 'Granada';
        $solicitud8->email = 'info@lambdait.com';
        $solicitud8->titularidad = 'Privada';
        $solicitud8->horario_comienzo = '09:30';
        $solicitud8->horario_fin = '18:30';
        $solicitud8->centro_id = 8;
        $solicitud8->empresa_id = 8;
        $solicitud8->save();

        $solicitud9 = new Solicitud();
        $solicitud9->nombreEmpresa = 'Sigma Consulting';
        $solicitud9->actividad = 'Consultoría Empresarial';
        $solicitud9->cif = 'J66778899';
        $solicitud9->provincia = 'Alicante';
        $solicitud9->localidad = 'Alicante';
        $solicitud9->email = 'contact@sigma-consulting.com';
        $solicitud9->titularidad = 'Pública';
        $solicitud9->horario_comienzo = '08:00';
        $solicitud9->horario_fin = '16:00';
        $solicitud9->centro_id = 9;
        $solicitud9->empresa_id = 9;
        $solicitud9->save();

        $solicitud10 = new Solicitud();
        $solicitud10->nombreEmpresa = 'Theta Analytics';
        $solicitud10->actividad = 'Análisis de Datos';
        $solicitud10->cif = 'K99887766';
        $solicitud10->provincia = 'Santander';
        $solicitud10->localidad = 'Santander';
        $solicitud10->email = 'info@thetaanalytics.com';
        $solicitud10->titularidad = 'Privada';
        $solicitud10->horario_comienzo = '09:00';
        $solicitud10->horario_fin = '17:30';
        $solicitud10->centro_id = 10;
        $solicitud10->empresa_id = 10;
        $solicitud10->save();
    }
}
