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
        $solicitud1->nombreEmpresa = 'Beta Solutions';
        $solicitud1->actividad = 'Consultoría';
        $solicitud1->cif = '87654321D';
        $solicitud1->provincia = 'Barcelona';
        $solicitud1->localidad = 'Barcelona';
        $solicitud1->email = 'info@betasolutions.com';
        $solicitud1->titularidad = 'Pública';
        $solicitud1->horario_comienzo = '09:00';
        $solicitud1->horario_fin = '18:00';
        $solicitud1->centro_id = 2;
        $solicitud1->empresa_id = 2;
        $solicitud1->save();
        $solicitud1->ciclos()->attach([3, 4], ['numero_puestos' => 3]);

        $solicitud2 = new Solicitud();
        $solicitud2->nombreEmpresa = 'Delta Innovación';
        $solicitud2->actividad = 'Educación';
        $solicitud2->cif = '55667788G';
        $solicitud2->provincia = 'Sevilla';
        $solicitud2->localidad = 'Sevilla';
        $solicitud2->email = 'contacto@deltainnova.com';
        $solicitud2->titularidad = 'Pública';
        $solicitud2->horario_comienzo = '07:00';
        $solicitud2->horario_fin = '15:00';
        $solicitud2->centro_id = 4;
        $solicitud2->empresa_id = 4;
        $solicitud2->save();
        $solicitud2->ciclos()->attach([4, 3], ['numero_puestos' => 5]);

        $solicitud3 = new Solicitud();
        $solicitud3->nombreEmpresa = 'Empresa Alpha';
        $solicitud3->actividad = 'Tecnología';
        $solicitud3->cif = '12345678D';
        $solicitud3->provincia = 'Madrid';
        $solicitud3->localidad = 'Madrid';
        $solicitud3->email = 'contacto@empresaalpha.com';
        $solicitud3->titularidad = 'Privada';
        $solicitud3->horario_comienzo = '08:00';
        $solicitud3->horario_fin = '17:00';
        $solicitud3->centro_id = 1;
        $solicitud3->empresa_id = 1;
        $solicitud3->save();
        $solicitud3->ciclos()->attach([1, 2], ['numero_puestos' => 5]);

        $solicitud4 = new Solicitud();
        $solicitud4->nombreEmpresa = 'Empresa Alpha';
        $solicitud4->actividad = 'Tecnología';
        $solicitud4->cif = '12345678D';
        $solicitud4->provincia = 'Madrid';
        $solicitud4->localidad = 'Madrid';
        $solicitud4->email = 'contacto@empresaalpha.com';
        $solicitud4->titularidad = 'Privada';
        $solicitud4->horario_comienzo = '08:00';
        $solicitud4->horario_fin = '17:00';
        $solicitud4->centro_id = 1;
        $solicitud4->empresa_id = 1;
        $solicitud4->save();
        $solicitud4->ciclos()->attach([3, 4], ['numero_puestos' => 7]);

        $solicitud5 = new Solicitud();
        $solicitud5->nombreEmpresa = 'Gamma Corp';
        $solicitud5->actividad = 'Finanzas';
        $solicitud5->cif = '11223344E';
        $solicitud5->provincia = 'Valencia';
        $solicitud5->localidad = 'Valencia';
        $solicitud5->email = 'contact@gammacorp.com';
        $solicitud5->titularidad = 'Privada';
        $solicitud5->horario_comienzo = '08:30';
        $solicitud5->horario_fin = '17:30';
        $solicitud5->centro_id = 3;
        $solicitud5->empresa_id = 3;
        $solicitud5->save();
        $solicitud5->ciclos()->attach([5, 6], ['numero_puestos' => 3]);

        $solicitud6 = new Solicitud();
        $solicitud6->nombreEmpresa = 'Epsilon Tech';
        $solicitud6->actividad = 'Desarrollo de Software';
        $solicitud6->cif = '99887766T';
        $solicitud6->provincia = 'Bilbao';
        $solicitud6->localidad = 'Bilbao';
        $solicitud6->email = 'info@epsilontec.com';
        $solicitud6->titularidad = 'Privada';
        $solicitud6->horario_comienzo = '10:00';
        $solicitud6->horario_fin = '19:00';
        $solicitud6->centro_id = 5;
        $solicitud6->empresa_id = 5;
        $solicitud6->save();
        $solicitud6->ciclos()->attach([4, 3], ['numero_puestos' => 2]);

        $solicitud7 = new Solicitud();
        $solicitud7->nombreEmpresa = 'Zeta Construcciones';
        $solicitud7->actividad = 'Construcción';
        $solicitud7->cif = '22334455G';
        $solicitud7->provincia = 'Málaga';
        $solicitud7->localidad = 'Málaga';
        $solicitud7->email = 'contacto@zetaconstrucciones.com';
        $solicitud7->titularidad = 'Privada';
        $solicitud7->horario_comienzo = '06:00';
        $solicitud7->horario_fin = '14:00';
        $solicitud7->centro_id = 6;
        $solicitud7->empresa_id = 6;
        $solicitud7->save();
        $solicitud7->ciclos()->attach([4, 3], ['numero_puestos' => 5]);

        $solicitud8 = new Solicitud();
        $solicitud8->nombreEmpresa = 'Omega Marketing';
        $solicitud8->actividad = 'Marketing y Publicidad';
        $solicitud8->cif = '11224433J';
        $solicitud8->provincia = 'Zaragoza';
        $solicitud8->localidad = 'Zaragoza';
        $solicitud8->email = 'info@omegamarketing.com';
        $solicitud8->titularidad = 'Pública';
        $solicitud8->horario_comienzo = '08:00';
        $solicitud8->horario_fin = '17:00';
        $solicitud8->centro_id = 7;
        $solicitud8->empresa_id = 7;
        $solicitud8->save();
        $solicitud8->ciclos()->attach([7, 6], ['numero_puestos' => 1]);

        $solicitud9 = new Solicitud();
        $solicitud9->nombreEmpresa = 'Lambda IT';
        $solicitud9->actividad = 'Desarrollo Web';
        $solicitud9->cif = '55443322L';
        $solicitud9->provincia = 'Granada';
        $solicitud9->localidad = 'Granada';
        $solicitud9->email = 'info@lambdait.com';
        $solicitud9->titularidad = 'Privada';
        $solicitud9->horario_comienzo = '09:30';
        $solicitud9->horario_fin = '18:30';
        $solicitud9->centro_id = 8;
        $solicitud9->empresa_id = 8;
        $solicitud9->save();
        $solicitud9->ciclos()->attach([2, 3], ['numero_puestos' => 4]);

        $solicitud10 = new Solicitud();
        $solicitud10->nombreEmpresa = 'Sigma Consulting';
        $solicitud10->actividad = 'Consultoría Empresarial';
        $solicitud10->cif = '66778899J';
        $solicitud10->provincia = 'Alicante';
        $solicitud10->localidad = 'Alicante';
        $solicitud10->email = 'contact@sigma-consulting.com';
        $solicitud10->titularidad = 'Pública';
        $solicitud10->horario_comienzo = '08:00';
        $solicitud10->horario_fin = '16:00';
        $solicitud10->centro_id = 9;
        $solicitud10->empresa_id = 9;
        $solicitud10->save();
        $solicitud10->ciclos()->attach([4, 5], ['numero_puestos' => 8]);

        $solicitud11 = new Solicitud();
        $solicitud11->nombreEmpresa = 'Theta Analytics';
        $solicitud11->actividad = 'Análisis de Datos';
        $solicitud11->cif = '99887766M';
        $solicitud11->provincia = 'Santander';
        $solicitud11->localidad = 'Santander';
        $solicitud11->email = 'info@thetaanalytics.com';
        $solicitud11->titularidad = 'Privada';
        $solicitud11->horario_comienzo = '09:00';
        $solicitud11->horario_fin = '17:30';
        $solicitud11->centro_id = 10;
        $solicitud11->empresa_id = 10;
        $solicitud11->save();
        $solicitud11->ciclos()->attach([4, 5], ['numero_puestos' => 8]);

        $solicitud12 = new Solicitud();
        $solicitud12->nombreEmpresa = 'Iota Logística';
        $solicitud12->actividad = 'Transporte y Logística';
        $solicitud12->cif = '12345678A';
        $solicitud12->provincia = 'Madrid';
        $solicitud12->localidad = 'Madrid';
        $solicitud12->email = 'info@iotalogistica.com';
        $solicitud12->titularidad = 'Privada';
        $solicitud12->horario_comienzo = '07:30';
        $solicitud12->horario_fin = '16:30';
        $solicitud12->centro_id = 1;
        $solicitud12->empresa_id = 11;
        $solicitud12->save();
        $solicitud12->ciclos()->attach([1, 3], ['numero_puestos' => 4]);

        $solicitud13 = new Solicitud();
        $solicitud13->nombreEmpresa = 'Kappa Energía';
        $solicitud13->actividad = 'Energías Renovables';
        $solicitud13->cif = '87654321B';
        $solicitud13->provincia = 'Barcelona';
        $solicitud13->localidad = 'Barcelona';
        $solicitud13->email = 'contacto@kappaenergia.com';
        $solicitud13->titularidad = 'Pública';
        $solicitud13->horario_comienzo = '08:00';
        $solicitud13->horario_fin = '17:00';
        $solicitud13->centro_id = 2;
        $solicitud13->empresa_id = 12;
        $solicitud13->save();
        $solicitud13->ciclos()->attach([2, 4], ['numero_puestos' => 6]);

        $solicitud14 = new Solicitud();
        $solicitud14->nombreEmpresa = 'Mu Construcciones';
        $solicitud14->actividad = 'Construcción Civil';
        $solicitud14->cif = '11223344C';
        $solicitud14->provincia = 'Valencia';
        $solicitud14->localidad = 'Valencia';
        $solicitud14->email = 'info@muconstrucciones.com';
        $solicitud14->titularidad = 'Privada';
        $solicitud14->horario_comienzo = '06:00';
        $solicitud14->horario_fin = '14:00';
        $solicitud14->centro_id = 3;
        $solicitud14->empresa_id = 13;
        $solicitud14->save();
        $solicitud14->ciclos()->attach([5, 6], ['numero_puestos' => 3]);

        $solicitud15 = new Solicitud();
        $solicitud15->nombreEmpresa = 'Nu Telecomunicaciones';
        $solicitud15->actividad = 'Telecomunicaciones';
        $solicitud15->cif = '55667788D';
        $solicitud15->provincia = 'Sevilla';
        $solicitud15->localidad = 'Sevilla';
        $solicitud15->email = 'contacto@nutelecom.com';
        $solicitud15->titularidad = 'Pública';
        $solicitud15->horario_comienzo = '09:00';
        $solicitud15->horario_fin = '18:00';
        $solicitud15->centro_id = 4;
        $solicitud15->empresa_id = 14;
        $solicitud15->save();
        $solicitud15->ciclos()->attach([7, 8], ['numero_puestos' => 5]);

        $solicitud16 = new Solicitud();
        $solicitud16->nombreEmpresa = 'Xi Alimentos';
        $solicitud16->actividad = 'Producción de Alimentos';
        $solicitud16->cif = '99887766E';
        $solicitud16->provincia = 'Bilbao';
        $solicitud16->localidad = 'Bilbao';
        $solicitud16->email = 'info@xialimentos.com';
        $solicitud16->titularidad = 'Privada';
        $solicitud16->horario_comienzo = '07:00';
        $solicitud16->horario_fin = '15:00';
        $solicitud16->centro_id = 5;
        $solicitud16->empresa_id = 15;
        $solicitud16->save();
        $solicitud16->ciclos()->attach([8, 1], ['numero_puestos' => 7]);

        $solicitud17 = new Solicitud();
        $solicitud17->nombreEmpresa = 'Omicron Salud';
        $solicitud17->actividad = 'Servicios de Salud';
        $solicitud17->cif = '22334455F';
        $solicitud17->provincia = 'Málaga';
        $solicitud17->localidad = 'Málaga';
        $solicitud17->email = 'contacto@omicronsalud.com';
        $solicitud17->titularidad = 'Privada';
        $solicitud17->horario_comienzo = '08:30';
        $solicitud17->horario_fin = '17:30';
        $solicitud17->centro_id = 6;
        $solicitud17->empresa_id = 16;
        $solicitud17->save();
        $solicitud17->ciclos()->attach([1, 2], ['numero_puestos' => 2]);

        $solicitud18 = new Solicitud();
        $solicitud18->nombreEmpresa = 'Pi Innovación';
        $solicitud18->actividad = 'Innovación Tecnológica';
        $solicitud18->cif = '11224433G';
        $solicitud18->provincia = 'Zaragoza';
        $solicitud18->localidad = 'Zaragoza';
        $solicitud18->email = 'info@piinnovacion.com';
        $solicitud18->titularidad = 'Pública';
        $solicitud18->horario_comienzo = '09:00';
        $solicitud18->horario_fin = '18:00';
        $solicitud18->centro_id = 7;
        $solicitud18->empresa_id = 17;
        $solicitud18->save();
        $solicitud18->ciclos()->attach([3, 4], ['numero_puestos' => 4]);

        $solicitud19 = new Solicitud();
        $solicitud19->nombreEmpresa = 'Rho Consultores';
        $solicitud19->actividad = 'Consultoría Estratégica';
        $solicitud19->cif = '55443322H';
        $solicitud19->provincia = 'Granada';
        $solicitud19->localidad = 'Granada';
        $solicitud19->email = 'info@rhoconsultores.com';
        $solicitud19->titularidad = 'Privada';
        $solicitud19->horario_comienzo = '08:00';
        $solicitud19->horario_fin = '17:00';
        $solicitud19->centro_id = 8;
        $solicitud19->empresa_id = 18;
        $solicitud19->save();
        $solicitud19->ciclos()->attach([5, 6], ['numero_puestos' => 3]);

        $solicitud20 = new Solicitud();
        $solicitud20->nombreEmpresa = 'Tau Finanzas';
        $solicitud20->actividad = 'Servicios Financieros';
        $solicitud20->cif = '66778899I';
        $solicitud20->provincia = 'Alicante';
        $solicitud20->localidad = 'Alicante';
        $solicitud20->email = 'contacto@taufinanzas.com';
        $solicitud20->titularidad = 'Pública';
        $solicitud20->horario_comienzo = '09:30';
        $solicitud20->horario_fin = '18:30';
        $solicitud20->centro_id = 9;
        $solicitud20->empresa_id = 19;
        $solicitud20->save();
        $solicitud20->ciclos()->attach([7, 4], ['numero_puestos' => 5]);

        $solicitud21 = new Solicitud();
        $solicitud21->nombreEmpresa = 'Upsilon Retail';
        $solicitud21->actividad = 'Venta al por Menor';
        $solicitud21->cif = '99887766J';
        $solicitud21->provincia = 'Santander';
        $solicitud21->localidad = 'Santander';
        $solicitud21->email = 'info@upsilonretail.com';
        $solicitud21->titularidad = 'Privada';
        $solicitud21->horario_comienzo = '10:00';
        $solicitud21->horario_fin = '19:00';
        $solicitud21->centro_id = 10;
        $solicitud21->empresa_id = 20;
        $solicitud21->save();
        $solicitud21->ciclos()->attach([6, 4], ['numero_puestos' => 6]);
    }
}
