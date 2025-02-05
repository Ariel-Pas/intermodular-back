<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaBasicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //Datos par ausuarios sin acceso
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'email' => $this->email,
            'direccion' => [
                'calle' => $this->direccion,
                'provincia' => new ProvinciaResource($this->province()),
                'poblacion'=> $this->town->name,
                'posicion' => [
                    'coordX' => $this->coordX,
                    'coordY' => $this->coordY
                    ]
                ],
            'horario' => [
                'horario_manana' => $this->horario_manana,
                'horario_tarde' => $this->horario_tarde,
                'finSemana' => $this->finSemana
            ],
            'imagen' => $this->imagen,
            'categorias' => [],
            'servicios' => [],
            'vacantes' => $this->vacantes,
            'puntuacion'=> $this->puntuacion_alumno
        ];
    }
}
