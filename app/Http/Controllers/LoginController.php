<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login (Request $request)
    {

        $credenciales = $request->only(['email', 'password']);

        if(Auth::attempt(['email' => $credenciales['email'], 'password' => $credenciales['password']]))
        {
            $request->session()->regenerate();
            return redirect()->intended(route('empresas.index'));
        }
        else{
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
}
