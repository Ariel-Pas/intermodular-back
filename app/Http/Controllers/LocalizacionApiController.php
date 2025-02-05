<?php

namespace App\Http\Controllers;

/* use App\Models\Community;
use App\Models\Province; */
//use App\Models\Town;

use App\Http\Resources\ProvinciaResource;
use Illuminate\Http\Request;
use Flogti\SpanishCities\Models\Town;
use Flogti\SpanishCities\Models\Community;
use Flogti\SpanishCities\Models\Province;

class LocalizacionApiController extends Controller
{
    //obtener provincias- nombre e i
    public function getProvincias(){
        $provincias = Community::find(10)->provinces;
        return response()->json(ProvinciaResource::collection($provincias));
    }

    public function getProvincia($id)
    {
        $provincia = Province::find($id);
        return response()->json(new ProvinciaResource($provincia));
    }

    public function getMunicipios($id)
    {

        $municipios = Town::select('id','province_id', 'name')->where('province_id', '=', $id)->get();
        return response()->json($municipios);
    }

    public function getMunicipio($id)
    {
        $municipio = Town::findOrFail($id);
        return response()->json($municipio);
    }



    //obtener municipios por id provincia - devolver id, nombre y provincia

    //obtener nombre de provincia por id?
    //obtener nombre de localidad por id?




}
