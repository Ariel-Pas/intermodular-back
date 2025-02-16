<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SolicitudRequest;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Empresa;
use App\Models\Centro;
use Illuminate\Support\Str;
use \Exception;

class SolicitudControllerApi extends Controller
{



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


    //  public function store(SolicitudRequest $request)
    //  {
    //      // antes de hacer un insert de una solicitud debo comprobar si existe la empresa en la bbdd observando el cif,
    //      // si el cif existe en la bbdd debo asociar la solicitud a la empresa para que agrega la solicitud a dicha empresa

    //      $empresa = Empresa::where('cif', $request->cif)->first();
    //      try {
    //          $solicitud = Solicitud::create([
    //              'nombreEmpresa' => $request->nombreEmpresa,
    //              'actividad' => $request->actividad,
    //              'cif' => $request->cif,
    //              'provincia' => $request->provincia,
    //              'localidad' => $request->localidad,
    //              'email' => $request->email,
    //              'titularidad' => $request->titularidad,
    //              'horario_comienzo' => $request->horario_comienzo,
    //              'horario_fin' => $request->horario_fin,
    //              'centro_id' => $request->centro_id,
    //              // 'empresa_id' => $request->empresa_id,
    //              'empresa_id' => $empresa ? $empresa->id : null,  // asocio la empresa si existe, sino null
    //          ]);

    //          $solicitud->ciclos()->attach($request->ciclo_id, ['numero_puestos' => $request->numero_puestos]);


    //          return response()->json(['message' => 'Solicitud creada exitosamente', 'solicitud' => $solicitud], 201);
    //      } catch (Exception $ex) {
    //          return response()->json(['error' => $ex->getMessage()], 500);
    //      }
    //  }





    public function store(SolicitudRequest $request)
    {
        // antes de hacer un insert de una solicitud debo comprobar si existe la empresa en la bbdd observando el cif,
        // si el cif existe en la bbdd debo asociar la solicitud a la empresa para que agrega la solicitud a dicha empresa

        $empresa = Empresa::where('cif', $request->cif)->first();

        try {
            if (!$empresa) {
                $datos = [
                    'nombre' => $request->nombreEmpresa,
                    'cif' => $request->cif,
                    'provincia' => $request->provincia,
                    'email' => $request->email,
                    'titularidad' => $request->titularidad,
                    'horario_manana' => $request->horario_comienzo,
                    'horario_tarde' => $request->horario_fin,
                ];
                $empresa = new Empresa($datos);
                $empresa->token = Str::uuid();
                $empresa->town_id = $request->localidad;
                $empresa->cif = Str::upper($request->cif);
                $empresa->save();
                $centro = Centro::find($request->centro_id);
                $centro->empresas()->attach($empresa->id);
                $empresa->save();
            }

            $solicitud = Solicitud::create([
                'nombreEmpresa' => $request->nombreEmpresa,
                'cif' => $request->cif,
                'provincia' => $request->provincia,
                'localidad' => $request->localidad,
                'email' => $request->email,
                'horario_comienzo' => $request->horario_comienzo,
                'horario_fin' => $request->horario_fin,
                'actividad' => $request->actividad,
                'titularidad' => $request->titularidad,
                'centro_id' => $request->centro_id,
                'empresa_id' => $empresa ? $empresa->id : null,
            ]);

            // $solicitud->ciclos()->attach($request->ciclo_id, ['numero_puestos' => $request->numero_puestos]);

            foreach ($request->ciclos as $ciclo) {
                $solicitud->ciclos()->attach($ciclo['ciclo_id'], ['numero_puestos' => $ciclo['numero_puestos']]);
            }
            
            return response()->json(['message' => 'Solicitud creada exitosamente', 'solicitud' => $solicitud], 201);
        } catch (Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
