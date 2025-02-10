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
        $solicitud1->cif = '12345678D';
        $solicitud1->provincia = 'Madrid';
        $solicitud1->localidad = 'Madrid';
        $solicitud1->email = 'contacto@empresaalpha.com';
        $solicitud1->titularidad = 'Privada';
        $solicitud1->horario_comienzo = '08:00';
        $solicitud1->horario_fin = '17:00';
        $solicitud1->centro_id = 1;
        $solicitud1->empresa_id = 1;
        $solicitud1->save();
        $solicitud1->ciclos()->attach([1, 2], ['numero_puestos' => 5]);

        $solicitud2 = new Solicitud();
        $solicitud2->nombreEmpresa = 'Beta Solutions';
        $solicitud2->actividad = 'Consultoría';
        $solicitud2->cif = '87654321D';
        $solicitud2->provincia = 'Barcelona';
        $solicitud2->localidad = 'Barcelona';
        $solicitud2->email = 'info@betasolutions.com';
        $solicitud2->titularidad = 'Pública';
        $solicitud2->horario_comienzo = '09:00';
        $solicitud2->horario_fin = '18:00';
        $solicitud2->centro_id = 2;
        $solicitud2->empresa_id = 2;
        $solicitud2->save();
        $solicitud2->ciclos()->attach([3, 4], ['numero_puestos' => 3]);

        $solicitud3 = new Solicitud();
        $solicitud3->nombreEmpresa = 'Gamma Corp';
        $solicitud3->actividad = 'Finanzas';
        $solicitud3->cif = '11223344E';
        $solicitud3->provincia = 'Valencia';
        $solicitud3->localidad = 'Valencia';
        $solicitud3->email = 'contact@gammacorp.com';
        $solicitud3->titularidad = 'Privada';
        $solicitud3->horario_comienzo = '08:30';
        $solicitud3->horario_fin = '17:30';
        $solicitud3->centro_id = 3;
        $solicitud3->empresa_id = 3;
        $solicitud3->save();
        $solicitud3->ciclos()->attach([5, 6], ['numero_puestos' => 3]);

        $solicitud4 = new Solicitud();
        $solicitud4->nombreEmpresa = 'Delta Innovación';
        $solicitud4->actividad = 'Educación';
        $solicitud4->cif = '55667788G';
        $solicitud4->provincia = 'Sevilla';
        $solicitud4->localidad = 'Sevilla';
        $solicitud4->email = 'contacto@deltainnova.com';
        $solicitud4->titularidad = 'Pública';
        $solicitud4->horario_comienzo = '07:00';
        $solicitud4->horario_fin = '15:00';
        $solicitud4->centro_id = 4;
        $solicitud4->empresa_id = 4;
        $solicitud4->save();
        $solicitud4->ciclos()->attach([4, 3], ['numero_puestos' => 5]);

        $solicitud5 = new Solicitud();
        $solicitud5->nombreEmpresa = 'Epsilon Tech';
        $solicitud5->actividad = 'Desarrollo de Software';
        $solicitud5->cif = '99887766T';
        $solicitud5->provincia = 'Bilbao';
        $solicitud5->localidad = 'Bilbao';
        $solicitud5->email = 'info@epsilontec.com';
        $solicitud5->titularidad = 'Privada';
        $solicitud5->horario_comienzo = '10:00';
        $solicitud5->horario_fin = '19:00';
        $solicitud5->centro_id = 5;
        $solicitud5->empresa_id = 5;
        $solicitud5->save();
        $solicitud5->ciclos()->attach([4, 3], ['numero_puestos' => 2]);

        $solicitud6 = new Solicitud();
        $solicitud6->nombreEmpresa = 'Zeta Construcciones';
        $solicitud6->actividad = 'Construcción';
        $solicitud6->cif = '22334455G';
        $solicitud6->provincia = 'Málaga';
        $solicitud6->localidad = 'Málaga';
        $solicitud6->email = 'contacto@zetaconstrucciones.com';
        $solicitud6->titularidad = 'Privada';
        $solicitud6->horario_comienzo = '06:00';
        $solicitud6->horario_fin = '14:00';
        $solicitud6->centro_id = 6;
        $solicitud6->empresa_id = 6;
        $solicitud6->save();
        $solicitud6->ciclos()->attach([4, 3], ['numero_puestos' => 5]);

        $solicitud7 = new Solicitud();
        $solicitud7->nombreEmpresa = 'Omega Marketing';
        $solicitud7->actividad = 'Marketing y Publicidad';
        $solicitud7->cif = '11224433J';
        $solicitud7->provincia = 'Zaragoza';
        $solicitud7->localidad = 'Zaragoza';
        $solicitud7->email = 'info@omegamarketing.com';
        $solicitud7->titularidad = 'Pública';
        $solicitud7->horario_comienzo = '08:00';
        $solicitud7->horario_fin = '17:00';
        $solicitud7->centro_id = 7;
        $solicitud7->empresa_id = 7;
        $solicitud7->save();
        $solicitud7->ciclos()->attach([7, 6], ['numero_puestos' => 1]);

        $solicitud8 = new Solicitud();
        $solicitud8->nombreEmpresa = 'Lambda IT';
        $solicitud8->actividad = 'Desarrollo Web';
        $solicitud8->cif = '55443322L';
        $solicitud8->provincia = 'Granada';
        $solicitud8->localidad = 'Granada';
        $solicitud8->email = 'info@lambdait.com';
        $solicitud8->titularidad = 'Privada';
        $solicitud8->horario_comienzo = '09:30';
        $solicitud8->horario_fin = '18:30';
        $solicitud8->centro_id = 8;
        $solicitud8->empresa_id = 8;
        $solicitud8->save();
        $solicitud8->ciclos()->attach([2, 3], ['numero_puestos' => 4]);

        $solicitud9 = new Solicitud();
        $solicitud9->nombreEmpresa = 'Sigma Consulting';
        $solicitud9->actividad = 'Consultoría Empresarial';
        $solicitud9->cif = '66778899J';
        $solicitud9->provincia = 'Alicante';
        $solicitud9->localidad = 'Alicante';
        $solicitud9->email = 'contact@sigma-consulting.com';
        $solicitud9->titularidad = 'Pública';
        $solicitud9->horario_comienzo = '08:00';
        $solicitud9->horario_fin = '16:00';
        $solicitud9->centro_id = 9;
        $solicitud9->empresa_id = 9;
        $solicitud9->save();
        $solicitud9->ciclos()->attach([4, 5], ['numero_puestos' => 8]);

        $solicitud10 = new Solicitud();
        $solicitud10->nombreEmpresa = 'Theta Analytics';
        $solicitud10->actividad = 'Análisis de Datos';
        $solicitud10->cif = '99887766M';
        $solicitud10->provincia = 'Santander';
        $solicitud10->localidad = 'Santander';
        $solicitud10->email = 'info@thetaanalytics.com';
        $solicitud10->titularidad = 'Privada';
        $solicitud10->horario_comienzo = '09:00';
        $solicitud10->horario_fin = '17:30';
        $solicitud10->centro_id = 10;
        $solicitud10->empresa_id = 10;
        $solicitud10->save();
        $solicitud10->ciclos()->attach([4, 5], ['numero_puestos' => 8]);

        $solicitud11 = new Solicitud();
        $solicitud11->nombreEmpresa = 'Iota Logística';
        $solicitud11->actividad = 'Transporte y Logística';
        $solicitud11->cif = '12345678A';
        $solicitud11->provincia = 'Madrid';
        $solicitud11->localidad = 'Madrid';
        $solicitud11->email = 'info@iotalogistica.com';
        $solicitud11->titularidad = 'Privada';
        $solicitud11->horario_comienzo = '07:30';
        $solicitud11->horario_fin = '16:30';
        $solicitud11->centro_id = 1;
        $solicitud11->empresa_id = 11;
        $solicitud11->save();
        $solicitud11->ciclos()->attach([1, 3], ['numero_puestos' => 4]);

        $solicitud12 = new Solicitud();
        $solicitud12->nombreEmpresa = 'Kappa Energía';
        $solicitud12->actividad = 'Energías Renovables';
        $solicitud12->cif = '87654321B';
        $solicitud12->provincia = 'Barcelona';
        $solicitud12->localidad = 'Barcelona';
        $solicitud12->email = 'contacto@kappaenergia.com';
        $solicitud12->titularidad = 'Pública';
        $solicitud12->horario_comienzo = '08:00';
        $solicitud12->horario_fin = '17:00';
        $solicitud12->centro_id = 2;
        $solicitud12->empresa_id = 12;
        $solicitud12->save();
        $solicitud12->ciclos()->attach([2, 4], ['numero_puestos' => 6]);

        $solicitud13 = new Solicitud();
        $solicitud13->nombreEmpresa = 'Mu Construcciones';
        $solicitud13->actividad = 'Construcción Civil';
        $solicitud13->cif = '11223344C';
        $solicitud13->provincia = 'Valencia';
        $solicitud13->localidad = 'Valencia';
        $solicitud13->email = 'info@muconstrucciones.com';
        $solicitud13->titularidad = 'Privada';
        $solicitud13->horario_comienzo = '06:00';
        $solicitud13->horario_fin = '14:00';
        $solicitud13->centro_id = 3;
        $solicitud13->empresa_id = 13;
        $solicitud13->save();
        $solicitud13->ciclos()->attach([5, 6], ['numero_puestos' => 3]);

        $solicitud14 = new Solicitud();
        $solicitud14->nombreEmpresa = 'Nu Telecomunicaciones';
        $solicitud14->actividad = 'Telecomunicaciones';
        $solicitud14->cif = '55667788D';
        $solicitud14->provincia = 'Sevilla';
        $solicitud14->localidad = 'Sevilla';
        $solicitud14->email = 'contacto@nutelecom.com';
        $solicitud14->titularidad = 'Pública';
        $solicitud14->horario_comienzo = '09:00';
        $solicitud14->horario_fin = '18:00';
        $solicitud14->centro_id = 4;
        $solicitud14->empresa_id = 14;
        $solicitud14->save();
        $solicitud14->ciclos()->attach([7, 8], ['numero_puestos' => 5]);

        $solicitud15 = new Solicitud();
        $solicitud15->nombreEmpresa = 'Xi Alimentos';
        $solicitud15->actividad = 'Producción de Alimentos';
        $solicitud15->cif = '99887766E';
        $solicitud15->provincia = 'Bilbao';
        $solicitud15->localidad = 'Bilbao';
        $solicitud15->email = 'info@xialimentos.com';
        $solicitud15->titularidad = 'Privada';
        $solicitud15->horario_comienzo = '07:00';
        $solicitud15->horario_fin = '15:00';
        $solicitud15->centro_id = 5;
        $solicitud15->empresa_id = 15;
        $solicitud15->save();
        $solicitud15->ciclos()->attach([8, 1], ['numero_puestos' => 7]);


        $solicitud16 = new Solicitud();
        $solicitud16->nombreEmpresa = 'Omicron Salud';
        $solicitud16->actividad = 'Servicios de Salud';
        $solicitud16->cif = '22334455F';
        $solicitud16->provincia = 'Málaga';
        $solicitud16->localidad = 'Málaga';
        $solicitud16->email = 'contacto@omicronsalud.com';
        $solicitud16->titularidad = 'Privada';
        $solicitud16->horario_comienzo = '08:30';
        $solicitud16->horario_fin = '17:30';
        $solicitud16->centro_id = 6;
        $solicitud16->empresa_id = 16;
        $solicitud16->save();
        $solicitud16->ciclos()->attach([1, 2], ['numero_puestos' => 2]);


        $solicitud17 = new Solicitud();
        $solicitud17->nombreEmpresa = 'Pi Innovación';
        $solicitud17->actividad = 'Innovación Tecnológica';
        $solicitud17->cif = '11224433G';
        $solicitud17->provincia = 'Zaragoza';
        $solicitud17->localidad = 'Zaragoza';
        $solicitud17->email = 'info@piinnovacion.com';
        $solicitud17->titularidad = 'Pública';
        $solicitud17->horario_comienzo = '09:00';
        $solicitud17->horario_fin = '18:00';
        $solicitud17->centro_id = 7;
        $solicitud17->empresa_id = 17;
        $solicitud17->save();
        $solicitud17->ciclos()->attach([3, 4], ['numero_puestos' => 4]);

        $solicitud18 = new Solicitud();
        $solicitud18->nombreEmpresa = 'Rho Consultores';
        $solicitud18->actividad = 'Consultoría Estratégica';
        $solicitud18->cif = '55443322H';
        $solicitud18->provincia = 'Granada';
        $solicitud18->localidad = 'Granada';
        $solicitud18->email = 'info@rhoconsultores.com';
        $solicitud18->titularidad = 'Privada';
        $solicitud18->horario_comienzo = '08:00';
        $solicitud18->horario_fin = '17:00';
        $solicitud18->centro_id = 8;
        $solicitud18->empresa_id = 18;
        $solicitud18->save();
        $solicitud18->ciclos()->attach([5, 6], ['numero_puestos' => 3]);

        $solicitud19 = new Solicitud();
        $solicitud19->nombreEmpresa = 'Tau Finanzas';
        $solicitud19->actividad = 'Servicios Financieros';
        $solicitud19->cif = '66778899I';
        $solicitud19->provincia = 'Alicante';
        $solicitud19->localidad = 'Alicante';
        $solicitud19->email = 'contacto@taufinanzas.com';
        $solicitud19->titularidad = 'Pública';
        $solicitud19->horario_comienzo = '09:30';
        $solicitud19->horario_fin = '18:30';
        $solicitud19->centro_id = 9;
        $solicitud19->empresa_id = 19;
        $solicitud19->save();
        $solicitud19->ciclos()->attach([7, 4], ['numero_puestos' => 5]);

        $solicitud20 = new Solicitud();
        $solicitud20->nombreEmpresa = 'Upsilon Retail';
        $solicitud20->actividad = 'Venta al por Menor';
        $solicitud20->cif = '99887766J';
        $solicitud20->provincia = 'Santander';
        $solicitud20->localidad = 'Santander';
        $solicitud20->email = 'info@upsilonretail.com';
        $solicitud20->titularidad = 'Privada';
        $solicitud20->horario_comienzo = '10:00';
        $solicitud20->horario_fin = '19:00';
        $solicitud20->centro_id = 10;
        $solicitud20->empresa_id = 20;
        $solicitud20->save();
        $solicitud20->ciclos()->attach([6, 4], ['numero_puestos' => 6]);
    }
}
