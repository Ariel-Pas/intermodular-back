<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Centro;
class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $centros = Centro::all();
        foreach ($centros as $centro) {
            Usuario::factory()->create(['centro_id' =>$centro->id]);
        }

        //admin
        /* $admin = new Usuario();
        $admin->nombre = 'admin';
        $admin->apellidos = 'admin';
        $admin->cif = '';
        $admin->email = 'admin';
        $admin->centro_id = 1;
        $admin->password = bcrypt('admin');
        $admin->save(); */

    }
}
