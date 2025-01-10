<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Centro;
class ControlEdicionCentros
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $idCentro): Response
    {
        dd($idCentro);
        //return redirect("/");

        //Sólo se pueden editar los centros que tienen un '1' en el nombre
        $centro = Centro::find($idCentro);
        if(!str_contains($centro->nombre, '1')){
            return redirect("/");
        }
        return $next($request);
    }
}
