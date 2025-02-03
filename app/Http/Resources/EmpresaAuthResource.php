<?php

namespace App\Http\Resources;
use App\Http\Controllers\Api\EmpresasApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpresaAuthResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'email' => $this->email,
            'direccion' => [
                'calle' => $this->direccion,
                'provincia' => $this->province(),
                'poblacion'=> $this->town,
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
            'puntuacion'=> $this->puntuacion_alumno,
            'notas' => $this->pivot->notas,
            'urlEditar' =>  action([EmpresasApiController::class, 'empresaPorToken'], ['token'=>$this->token])
        ];
    }
}
