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
        /* foreach ($centros as $centro) {
            Usuario::factory()->create(['centro_id' =>$centro->id]);
        } */

        //admin
        $admin = new Usuario();
        $admin->nombre = 'admin';
        $admin->apellidos = 'admin';
        $admin->email = 'admin';
        $admin->centro_id = null;
        $admin->role = "Admin";
        $admin->password = bcrypt('admin');
        $admin->save();

        //profe
        $prof = new Usuario();
        $prof->nombre = 'profesor';
        $prof->apellidos = 'profesor';
        $prof->email = 'profesor';
        $prof->centro_id = null;
        $prof->role = "Tutor";
        $prof->password = bcrypt('profesor');
        $prof->save();

        //centro
        $centro = new Usuario();
        $centro->nombre = 'centro';
        $centro->apellidos = 'centro';
        $centro->email = 'centro';
        $centro->centro_id = null;
        $centro->role = "Centro";
        $centro->password = bcrypt('centro');
        $centro->save();

    }
}
