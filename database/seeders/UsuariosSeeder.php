<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Centro;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

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
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach(Role::where('nombre', 'Admin')->first()->id);

        //TESTS
        $admin2 = new Usuario();
        $admin2->nombre = 'admin2';
        $admin2->apellidos = 'admin2';
        $admin2->email = 'admin2';
        $admin2->centro_id = null;
        $admin2->password = Hash::make('admin2');
        $admin2->save();
        $admin2->roles()->attach(Role::where('nombre', 'Admin')->first()->id);
        $admin2->roles()->attach(Role::where('nombre', 'Tutor')->first()->id);
        $admin2->roles()->attach(Role::where('nombre', 'Centro')->first()->id);


        //profe
        $prof = new Usuario();
        $prof->nombre = 'profesor';
        $prof->apellidos = 'profesor';
        $prof->email = 'profesor';

        $prof->centro_id = 1;
        //$prof->role = "profesor";

        $prof->password = bcrypt('profesor');
        $prof->save();
        $prof->roles()->attach(Role::where('nombre', 'Tutor')->first()->id);

        //centro
        $centro = new Usuario();
        $centro->nombre = 'centro';
        $centro->apellidos = 'centro';
        $centro->email = 'centro';

        $centro->centro_id = 1;
        //$centro->role = "centro";

        $centro->password = bcrypt('centro');
        $centro->save();
        $centro->roles()->attach(Role::where('nombre', 'Centro')->first()->id);
    }
}
