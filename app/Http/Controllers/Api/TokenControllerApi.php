<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Token;
use App\Models\Usuario;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Exception;

class TokenControllerApi extends Controller
{

    public function generarToken(Request $request)
    { // request = tiene idEmpresa y tipoFormulario
        try {
            $request->validate([
                'empresa_id' => 'required',
                'formulario_id' => 'required',
                'centro_id' => 'required'
            ]);
            // $centroUsuario = Auth::user()->centro;

            // $empresaUsuario= $centroUsuario->empresas->find($request->empresa_id);  // comprobar si la empresa está asociada al usuario
            // if($empresaUsuario) {

            $token = Str::uuid();
            // dd($token);
            Token::create([
                'token' => $token,
                'empresa_id' => $request->empresa_id,
                'centro_id' => $request->centro_id, //$centroUsuario->id
                'formulario_id' => $request->formulario_id,
            ]);
            return response()->json(['url' => "/mostrarFormulario/$token"], 200);  // genero token , debo ver si debe coincidir con el endpoint o como

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
        // // } else {
        //     return response()->json(['error' => 'Empresa no asociada al usuario'], 403);
        // // }
    }

    public function obtenerFormularioPorToken($token) {  // nuevo
        $tokenData = Token::where('token', $token)->first();

        if ($tokenData) {
            return response()->json(['formulario_id' => $tokenData->formulario_id]);
        }
        return response()->json(['message' => 'Token no encontrado'], 404);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
