<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    //CORREGIR, CAMBIO LA ESTRUCTURA ROLE, YA NO ES UNA COLUMNA DE USER
    public function login(Request $request)
    {

        $credenciales = $request->only(['email', 'password']);

        if (Auth::attempt(['email' => $credenciales['email'], 'password' => $credenciales['password']])) {
            $request->session()->regenerate();
            // return redirect()->intended(route('empresas.index'));
            if (Auth::user()->role == 'Admin') {
                //ACTUALIZAR RUTA
                return redirect()->intended(route('controlPanel'));
            }

            if (Auth::user()->role == 'Centro') {
                //ACTUALIZAR RUTA
                return redirect()->intended(route('listaUsuarios'));
            }

            if (Auth::user()->role == 'Tutor') {
                //ACTUALIZAR RUTA
                return redirect()->intended(route('listaUsuarios'));
            }
        } else {
            $msg = 'No se ha encontrado el usuario';
            return view('auth.login', compact('msg'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    //ACTUALIZAR
    public function apiLogin(Request $request)
    {
        $credenciales = $request->only(['email', 'password']);

        if (Auth::attempt(['email' => $credenciales['email'], 'password' => $credenciales['password']])) {
            $user = Auth::user();
            $token = $user->createToken('auth')->plainTextToken;
            return response()->json([
                'access_token' => $token,
                'token_type' => 'Bearer',
                //pluck('nombre') DEVUELVE UN ARRAY PLANO CON LOS NOMBRES DE LOS ROLES.
                'roles' => $user->roles->pluck('nombre'),
                // 'roles' => $user->roles->pluck('id'),
                'nombre' => $user->nombre
            ]);
            // return redirect('/admin')->with([
            //     'access_token' => $token,
            //     'token_type' => 'Bearer'
            // ]);
        } else {
            return response()->json([
                'message' => 'Datos incorrectos'

            ]);
        }
    }
}
