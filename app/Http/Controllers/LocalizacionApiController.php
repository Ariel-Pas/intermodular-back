<?php

namespace App\Http\Controllers;

use App\Models\Community;
use App\Models\Province;
use App\Models\Town;
use Illuminate\Http\Request;

class LocalizacionApiController extends Controller
{
    //obtener provincias- nombre e id
    public function getProvincias(){
        $provincias = Community::find(10)->provinces;
        return response()->json($provincias);
    }

    public function getProvincia($id)
    {
        $provincia = Province::find($id);
        return response()->json($provincia);
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
