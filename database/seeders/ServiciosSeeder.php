<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Servicio;
use App\Models\Categoria;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicios = [
            ["categoria" => 1, "id" => 1, "nombre" => "Frontend"],
            ["categoria" => 1, "id" => 2, "nombre" => "Backend"],
            ["categoria" => 1, "id" => 3, "nombre" => "Diseño"],
            ["categoria" => 1, "id" => 4, "nombre" => "Angular"],
            ["categoria" => 1, "id" => 5, "nombre" => "React"],
            ["categoria" => 1, "id" => 6, "nombre" => "Vue"],
            ["categoria" => 1, "id" => 7, "nombre" => "Laravel"],
            ["categoria" => 1, "id" => 8, "nombre" => "Ruby on Rails"],
            ["categoria" => 1, "id" => 9, "nombre" => ".NET"],
            ["categoria" => 1, "id" => 10, "nombre" => "Java Spring"],
            ["categoria" => 1, "id" => 11, "nombre" => "Django"],
            ["categoria" => 1, "id" => 12, "nombre" => "Express"],
            ["categoria" => 1, "id" => 13, "nombre" => "Bootstrap"],
            ["categoria" => 1, "id" => 14, "nombre" => "Tailwind"],
            ["categoria" => 2, "id" => 15, "nombre" => "Dispositivos móviles"],
            ["categoria" => 2, "id" => 16, "nombre" => "Escritorio"],
            ["categoria" => 2, "id" => 17, "nombre" => "Linux"],
            ["categoria" => 2, "id" => 18, "nombre" => "Windows"],
            ["categoria" => 2, "id" => 19, "nombre" => "MacOS"],
            ["categoria" => 2, "id" => 20, "nombre" => "Android"],
            ["categoria" => 2, "id" => 21, "nombre" => "iOS"],
            ["categoria" => 2, "id" => 22, "nombre" => "C/C++"],
            ["categoria" => 2, "id" => 23, "nombre" => "C#"],
            ["categoria" => 2, "id" => 24, "nombre" => "Java"],
            ["categoria" => 2, "id" => 25, "nombre" => "Rust"],
            ["categoria" => 2, "id" => 26, "nombre" => "Python"],
            ["categoria" => 2, "id" => 27, "nombre" => "Go"],
            ["categoria" => 3, "id" => 28, "nombre" => "Redes"],
            ["categoria" => 3, "id" => 29, "nombre" => "Linux"],
            ["categoria" => 3, "id" => 30, "nombre" => "Windows"],
            ["categoria" => 3, "id" => 31, "nombre" => "Windows Server"],
            ["categoria" => 3, "id" => 32, "nombre" => "Cisco"],
            ["categoria" => 4, "id" => 33, "nombre" => "Administrativo"],
            ["categoria" => 4, "id" => 34, "nombre" => "Gestión"],
            ["categoria" => 4, "id" => 35, "nombre" => "Personal"],
            ["categoria" => 4, "id" => 36, "nombre" => "Finanzas"],
            ["categoria" => 4, "id" => 37, "nombre" => "Café"],
        ];

        // foreach ($servicios as $servicioData) {
        //     $servicio = Servicio::create([
        //         'id' => $servicioData['id'],
        //         'nombre' => $servicioData['nombre']
        //     ]);

        //     $categoria = Categoria::find($servicioData['categoria']);
        //     if ($categoria) {
        //         $servicio->categorias()->attach($categoria->id);
        //     }
        // }

        foreach ($servicios as $servicioData) {
            $categoria = Categoria::find($servicioData['categoria']);

            if ($categoria) {
                Servicio::create([
                    'id' => $servicioData['id'],
                    'nombre' => $servicioData['nombre'],
                    'categoria_id' => $categoria->id, 
                ]);
            }
        }
    }
}
