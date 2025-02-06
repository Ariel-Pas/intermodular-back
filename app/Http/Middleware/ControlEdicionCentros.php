<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class ControlEdicionCentros
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $idEmpresa): Response
    {
        //comprobar que el usuario es centro o profesor, y que su centro tiene relación con la empresa a editar
        $empresa= null;
        // $user = Auth::user();
        // $rolesUsuario = $user->roles->pluck('nombre');

        // if ($rolesUsuario->contains('Admin') || $rolesUsuario->contains('Centro') || $rolesUsuario->contains('Tutor')) {
        // if(Auth::user()->role == 'Admin' || Auth::user()->role == 'Centro' || Auth::user()->role == 'Tutor'){

        if(Auth::user()->role == 'Centro' || Auth::user()->role == 'Tutor'){
            $empresa = Auth::user()->centro->empresas->where('id', '=', $idEmpresa);
        }
        if($empresa == null) return redirect()->route('empresas', ['empresa' => $idEmpresa]);
        return $next($request);
    }
}
