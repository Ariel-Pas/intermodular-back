<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Centro;
use app\Models;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use \Exception;
use Illuminate\Support\Facades\Auth;

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

    //Esta se queda abierta para los alumnos
    public function empresasPorCentro($idCentro)
    {
        $centro = Centro::find($idCentro);
        $empresas = $centro->empresas()->with('town:id,name,province_id')->get();
        return response()->json($empresas);
    }

    /**
     * Guardar empresa desde crud profesores y centro
     */
    public function store(EmpresaRequest $request)
    {
        //TODO Por que ????'
        Centro::find(0);
        //este store lo usan profes y centros
        $user = Auth::user();
        $centro = $user->centro;
        //return response()->json($centro);
        try{
            $datos = $request->all();
            $empresa = new Empresa($datos);
            $empresa->save();
            $user->centro->empresas()->attach($empresa->id);
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
        //TODO Por que ????'
        Centro::find(0);
        $centro = Auth::user()->centro;
        //comprobar que el usuario está asociado a la empresa
        $empresa = Auth::user()->centro->empresas->find($id);
        if(!$empresa) return response()->json(json_encode(['error'=>'No existe la empresa']), 404);
        return response()->json($empresa);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmpresaRequest $request, string $id)
    {
        //ESTA SE USA SOLO PARA LA EMPRESA??
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
        //TODO Por que ????'
        Centro::find(0);
        //eliminar la relación de la empresa con el centro
        $centro = Auth::user()->centro;
        $centro->empresas()->detach($id);
        $empresa = Empresa::findOrFail($id);
        if($empresa->centros->isEmpty()) $empresa->delete();

        return response()->json($empresa);
    }


    //Métodos internos

    public function asociarEmpresaCentro($idEmpresa, $idCentro){

    }
    //actualizar nota
    //contactar
    //
}
