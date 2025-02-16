<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Centro;
use App\Models\Ciclo;
use Illuminate\Support\Facades\DB;
use Flogti\SpanishCities\Models\Town;
use Illuminate\Database\Eloquent\Builder;

class CentroApiController extends Controller
{
    public function index() {
        $centros = Centro::all();
        return response()->json($centros);
    }

    public function ciclosPorCentro($idCentro) {
        $ciclos = Centro::find($idCentro)->ciclos;
        return response()->json($ciclos);
    }

    public function centrosPorProvincia($idProvincia)
    {
        $centros = Centro::whereHas('town', function(Builder $query) use ($idProvincia){
            $query->where('province_id', '!=', null);
        })->get();

        /* $ids = DB::table('towns')->select('id')->where('province_id', '=', $idProvincia);

        $centros = Centro::whereIn('town_id', $ids)->get(); */

        return response()->json($centros);

    }

    public function centrosPorLocalidad($idLocalidad)
    {
        $centros = Centro::where('town_id', '=', $idLocalidad)->get();

        return response()->json($centros);

    }


}
