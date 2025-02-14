<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginApiController extends Controller
{

    public function login(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return response()->json(['error' => 'Credenciales no válidas'], 401);
        }

        // BLOQUEAR LOGIN VIA API A USUARIOS CON ROL ADMIN
        //ESTA LINEA DE AQUI, ESTROPEA EL LOGIN DE ANGULAR, HACIENDO QUE SI UN USUARIO
        // TIENE LOS 3 ROLES, SOLO POR TENER ADMIN YA LO BLOQUEA

        //if ($usuario->roles->pluck('nombre')->contains('Admin')) {
        //    return response()->json(['error' => 'Acceso no autorizado para usuarios Admin'], 403);
        //}

        //GENERAR TOKEN PARA AUTENTICACION API
        $token = $usuario->createToken($usuario->email)->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'roles'        => $usuario->roles->pluck('nombre'),
            'nombre'       => $usuario->nombre,
        ]);
    }

    public function logout(Request $request)
    {
        // $request->user()->currentAccessToken()->delete();
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout exitoso.'], 200);
    }
}
