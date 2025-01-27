<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use \Exception;

class EmpresasApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::with('town:id,name,province_id')->get();
        return response()->json($empresas);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmpresaRequest $request)
    {

        try{
            $datos = $request->all();
            $empresa = new Empresa($datos);
            $empresa->save();
            return response()->json($empresa);

        }catch(Exception $ex)
        {
            return response()->json(json_encode(['error'=>$ex->getMessage()]), 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empresa = Empresa::find($id); //que pasa si fail?
        if($empresa == null) return response()->json(json_encode(['error'=>'No existe la empresa']), 404);
        return response()->json($empresa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpresaRequest $request, string $id)
    {

        $empresa = Empresa::find($id);
        if($empresa == null) return response()->json(json_encode(['error'=>'No existe la empresa']), 404);


        //comprobar que cif y email no están en uso por otra empresa, porque el request no lleva restriccion de unique aquí
        $empresaMismoCif = Empresa::where('cif', '=', $request->cif)->first();
        //si el id de la empresa con ese cif no es el id sobre el que se está actuando es que está en uso por otra empresa
        if($empresaMismoCif != null && $empresaMismoCif->id != $id)  return response()->json(json_encode(['error'=>'Cif en uso']), 400);


        $empresaMismoEmail = Empresa::where('email', '=', $request->email)->first();
        if($empresaMismoEmail != null && $empresaMismoEmail->id != $id)  return response()->json(json_encode(['error'=>'Email en uso']), 400);

        $empresa->nombre = $request->nombre;
        $empresa->cif = $request->cif;
        $empresa->descripcion = $request->descripcion;
        $empresa->email = $request->email;
        $empresa->direccion = $request->direccion;
        $empresa->coordX = $request->coordX;
        $empresa->coordY = $request->coordY;
        $empresa->horario_manana = $request->horario_manana;
        $empresa->horario_tarde = $request->horario_tarde;
        $empresa->finSemana = $request->finSemana;
        $empresa->provincia = $request->provincia;
        $empresa->poblacion = $request->poblacion;

        //$empresa->update($datos);
        $empresa->save();

        return response()->json($empresa);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $empresa = Empresa::find($id); //que pasa si fail?
        if($empresa == null) return response()->json(json_encode(['error'=>'No existe la empresa']), 404);
        $empresa->delete();
        return response()->json($empresa);
    }
}
