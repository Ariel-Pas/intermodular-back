<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\ContactoEmpresa;
use App\Models\Empresa;
use App\Models\Centro;
use App\Models\Usuario;
use app\Models;
use Illuminate\Http\Request;
use App\Http\Requests\EmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;
use App\Http\Resources\EmpresaAuthResource;
use App\Http\Resources\EmpresaBasicResource;
use \Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use function PHPUnit\Framework\returnSelf;

class EmpresasApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empresas = Empresa::with('town:id,name,province_id')->get();
        return response()->json(new EmpresaBasicResource($empresas));
    }

    //Esta se queda abierta para los alumnos
    public function empresasPorCentro($idCentro)
    {
        $centro = Centro::find($idCentro);
        $empresas = $centro->empresas()->with('town:id,name,province_id')->get();
        return response()->json(EmpresaBasicResource::collection($empresas));
    }

    public function obtenerEmpresasUrl(){
        $centro = Auth::user()->centro;

        return response()->json(['url' => $centro->id]);
    }


    public function empresasPorAuth()
    {

        $centro = Auth::user()->centro;
        $empresas = $centro->empresas()->with('town:id,name,province_id')->get();
        return response()->json(EmpresaBasicResource::collection($empresas));
    }

    public function empresaCompleta($id)
    {
        $centro = Auth::user()->centro;
        //comprobar que el usuario está asociado a la empresa
        $empresa = Auth::user()->centro->empresas->find($id);
        if(!$empresa) return response()->json(json_encode(['error'=>'No existe la empresa']), 404);
        return response()->json(new EmpresaAuthResource($empresa));
    }

    /**
     * Guardar empresa desde crud profesores y centro
     */
    public function store(EmpresaRequest $request)
    {

        //este store lo usan profes y centros
        $user = Auth::user();
        $centro = $user->centro;
        //return response()->json($centro);
        try{
            $datos = $request->all();
            $empresa = new Empresa($datos);
            $empresa->token = Str::uuid();
            $empresa->cif = Str::upper($request->cif);
            $empresa->save();
            $user->centro->empresas()->attach($empresa->id);
            $empresa->save();
            return response()->json(new EmpresaAuthResource($empresa));

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
        $centro = Auth::user()->centro;
        //comprobar que el usuario está asociado a la empresa
        $empresa = Auth::user()->centro->empresas->find($id);
        if(!$empresa) return response()->json(json_encode(['error'=>'No existe la empresa']), 404);
        return response()->json(new EmpresaBasicResource($empresa));
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
        $empresaMismoCif = Empresa::where('cif', '=', strtoupper($request->cif))->first();
        //si el id de la empresa con ese cif no es el id sobre el que se está actuando es que está en uso por otra empresa
        if($empresaMismoCif != null && $empresaMismoCif->id != $id)  return response()->json(json_encode(['error'=>'Cif en uso']), 400);


        $empresaMismoEmail = Empresa::where('email', '=', $request->email)->first();
        if($empresaMismoEmail != null && $empresaMismoEmail->id != $id)  return response()->json(json_encode(['error'=>'Email en uso']), 400);

        $empresa->nombre = $request->nombre;
        $empresa->cif = strtoupper($request->cif);
        $empresa->descripcion = $request->descripcion;
        $empresa->email = $request->email;
        $empresa->direccion = $request->direccion;
        $empresa->coordX = $request->coordX;
        $empresa->coordY = $request->coordY;
        $empresa->horario_manana = $request->horario_manana;
        $empresa->horario_tarde = $request->horario_tarde;
        $empresa->finSemana = $request->finSemana;

        //$empresa->update($datos);
        $empresa->save();

        return response()->json(new EmpresaAuthResource($empresa));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        //eliminar la relación de la empresa con el centro
        $centro = Auth::user()->centro;
        $centro->empresas()->detach($id);
        $empresa = Empresa::findOrFail($id);
        if($empresa->centros->isEmpty()) $empresa->delete();

        return response()->json($empresa);
    }



    //asociar una empresa que ya existe a un centro
    public function asociarEmpresaCentro($idEmpresa){
        $centro = Auth::user()->centro;
        //comprobar si ya estaba asociada
        $empresaYaAsociada = $centro->empresas()->find($idEmpresa);
        if($empresaYaAsociada) return response()->json(['error' => 'Empresa ya asociada al centro'], 400);
        $centro->empresas()->attach($idEmpresa);
        return response(null, 201);
    }

    public function obtenerUrlEditarPorIdEmpresa($id)
    {
        //TODO comprobar que quien pide el token tiene permiso por estar asociado al centro


        $empresa = Auth::user()->centro->empresas->find($id);
        if(!$empresa) return response()->json(['error' => 'Id no existe'], 404);

        $url = action([EmpresasApiController::class, 'empresaPorToken'], ['token'=>$empresa->token]);
        return response()->json(['url' => $url]);
    }

    public function empresaPorToken($token)
    {
        $empresa = Empresa::where('token', '=', $token)->first();
        if(!$empresa) return response()->json(['error' => 'Token incorrecto']);

        return response()->json($empresa);

    }

    public function updateEmpresaPorToken($token, UpdateEmpresaRequest $request){
        $empresa = Empresa::where('token', '=', $token)->first();
        if(!$empresa) return response()->json(['error' => 'Token incorrecto']);

        //actualizar datos
        return $this->update($request, $empresa->id);

    }

    //comprobar si existe según cif para no volver a crearla
    public function obtenerEmpresaPorCif($cif)
    {
        $cif = strtoupper($cif);
        $empresa = Empresa::firstWhere('cif', '=', $cif);
        if($empresa) return response()->json($empresa);
        return response()->json(['error' => 'No existe una empresa con ese cif'], 404);
    }

    //actualizar nota
    public function actualizarNota($idEmpresa, Request $request)
    {
        $validated = $request->validate([
            'notas' => 'string'
        ]);

        $centro = Auth::user()->centro;
        $empresa = $centro->empresas->find($idEmpresa);
        if(!$empresa) return response()->json(['error' => 'Empresa no asociada'], 400);
        $centro->empresas->find($idEmpresa)->pivot->notas = $request->notas;
        $centro->empresas->find($idEmpresa)->pivot->save();
        return response()->json(new EmpresaAuthResource($empresa), 200);
    }


    //enviar mail a una o varias empresas
    public function enviarMail(Request $request)
    {
        $validated = $request->validate(
            [
                'empresas' => 'required | array | min:1',
                'mensaje' => 'required | string'
            ]
        );

        $datos = [
            'centro' => Auth::user()->centro->nombre,
            'mensaje' => $request->mensaje
        ];



        //obtener lista de empresas
        $empresas = Auth::user()->centro->empresas->whereIn('id', $request->empresas);
        //dd($empresas);
        foreach($empresas as $empresa){
            Mail::to($empresa)->send(new ContactoEmpresa($datos));
        }


        return response(null);

    }




}
