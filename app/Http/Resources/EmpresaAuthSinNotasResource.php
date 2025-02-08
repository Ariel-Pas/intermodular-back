<?php

namespace App\Http\Resources;
use App\Http\Controllers\Api\EmpresasApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
class EmpresaAuthSinNotasResource extends JsonResource
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
            'cif' => $this->cif,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'email' => $this->email,
            'direccion' => [
                'calle' => $this->direccion,
                'provincia' =>new ProvinciaResource($this->province()),
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
            'servicios' => DB::table('empresa_cat')->select(['categoria_id','servicio_id'])->where('empresa_id', '=', $this->id)->get(),
            'vacantes' => $this->vacantes,
            'puntuacion'=> $this->puntuacion_alumno,
            'urlEditar' =>  action([EmpresasApiController::class, 'empresaPorToken'], ['token'=>$this->token])
        ];
    }
}
