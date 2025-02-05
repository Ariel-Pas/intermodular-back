<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SolicitudRequest;
use Illuminate\Http\Request;
use App\Models\Solicitud;
use App\Models\Empresa;
use \Exception;

class SolicitudControllerApi extends Controller
{
    // antes de hacer un insert (post) de una solicitud debo comprobar si existe la empresa en la bbdd
    // observando el cif, si el cif existe debo asociar la solicitud a la empresa para que agrega la solicitud a dicha empresa




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
    public function store(SolicitudRequest $request)
    {
        // $empresa = Empresa::where('cif', $request->cif)->first();

        try {
            $solicitud = Solicitud::create([
                'nombreEmpresa' => $request->nombreEmpresa,
                'actividad' => $request->actividad,
                'cif' => $request->cif,
                'provincia' => $request->provincia,
                'localidad' => $request->localidad,
                'email' => $request->email,
                'titularidad' => $request->titularidad,
                'horario_comienzo' => $request->horario_comienzo,
                'horario_fin' => $request->horario_fin,
                'centro_id' => $request->centro_id,
                // 'empresa_id' => $empresa->id,
                'empresa_id' => $request->empresa_id,
            ]);
            return response()->json(['message' => 'Solicitud creada exitosamente', 'solicitud' => $solicitud], 201);

        } catch(Exception $ex) {
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
