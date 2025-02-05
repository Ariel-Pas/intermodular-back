<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Role();
        $admin->nombre = 'Admin';
        $admin->save();

        $centro = new Role();
        $centro->nombre = 'Centro';
        $centro->save();

        $tutor = new Role();
        $tutor->nombre = 'Tutor';
        $tutor->save();
    }
}
