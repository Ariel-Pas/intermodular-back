<?php

namespace App\Http\Resources;

use App\Models\Categoria;
use App\Models\Servicio;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;
class EmpresaBasicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //obtener info de categorias y servicios que está en la agregación

        $categoriasId = DB::table('empresa_cat')->select('categoria_id')->where('empresa_id', '=', $this->id)->pluck('categoria_id');
        $categorias = Categoria::whereIn('id', $categoriasId)->get();

        $serviciosId = DB::table('empresa_cat')->select('servicio_id')->where('empresa_id', '=', $this->id)->pluck('servicio_id');
        $servicios = Servicio::whereIn('id', $serviciosId)->get();
        //Datos par ausuarios sin acceso
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'email' => $this->email,
            'direccion' => [
                'calle' => $this->direccion,
                'provincia' => new ProvinciaResource($this->province()),
                'poblacion'=> [
                    'id' => $this->town->id,
                    'name' => $this->town->name,
                    'region' => $this->province()->id
                ],
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
            'categorias' => $categorias,
            'servicios' => ServicioBasicResource::collection($servicios),
            'vacantes' => $this->vacantes,
            'puntuacion'=> $this->puntuacion_alumno
        ];
    }
}
