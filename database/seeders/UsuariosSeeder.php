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
         $admin = new Usuario();
        $admin->nombre = 'admin';
        $admin->apellidos = 'admin';
        $admin->cif = '';
        $admin->email = 'admin';
        $admin->centro_id = 1;
        $admin->role = "admin";
        $admin->password = bcrypt('admin');
        $admin->save();

        //profe
        $prof = new Usuario();
        $prof->nombre = 'profesor';
        $prof->apellidos = 'profesor';
        $prof->cif = '2';
        $prof->email = 'profesor';
        $prof->centro_id = 1;
        $prof->role = "profesor";
        $prof->password = bcrypt('profesor');
        $prof->save();

        //centro
        $centro = new Usuario();
        $centro->nombre = 'centro';
        $centro->apellidos = 'centro';
        $centro->cif = '3';
        $centro->email = 'centro';
        $centro->centro_id = 1;
        $centro->role = "centro";
        $centro->password = bcrypt('centro');
        $centro->save();

    }
}
