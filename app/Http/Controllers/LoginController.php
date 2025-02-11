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

    public function login(Request $request)
    {
        $credenciales = $request->only(['email', 'password']);
        if (Auth::attempt(['email' => $credenciales['email'], 'password' => $credenciales['password']])) {

            $roles = Auth::user()->roles->pluck('nombre')->toArray();
            if (in_array('Admin',$roles)) {
                $request->session()->regenerate();
                return redirect()->intended(route('admin'));
            } else {
                Auth::logout();
                $request->session()->invalidate();
                $msg = 'Acceso no autorizado para este usuario.';
                //VER PORQUE NO MUESTRA MSG.
                return redirect()->route('login')->with('msg', $msg);
            }
        }else{
            $msg = 'No se ha encontrado el usuario';
        }
        return view('auth.login', compact('msg'));
    }

    // public function login(Request $request)
    // {

    //     $credenciales = $request->only(['email', 'password']);

    //     //BUSCAR USER Y SI NO ES ADMIN
    //     if (Auth::attempt(['email' => $credenciales['email'], 'password' => $credenciales['password']])) {
    //         $request->session()->regenerate();
    //         return redirect()->intended(route('admin'));
    //     } else {
    //         $msg = 'No se ha encontrado el usuario';
    //         return view('auth.login', compact('msg'));
    //     }
    // }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
