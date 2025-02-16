<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServicioBasicResource;
use App\Models\Servicio;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ServicioApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return response()->json(Servicio::all(), 200);
        return response()->json(Servicio::with('categorias')->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validarDatos = $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $servicio = Servicio::create($validarDatos);
        return response()->json($servicio, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $servicio = Servicio::find($id);
        if (!$servicio) {
            return response()->json(['error' => 'Servicio no encontrado'], 404);
        }
        return response()->json($servicio, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $servicio = Servicio::find($id);
        if (!$servicio) {
            return response()->json(['error' => 'Servicio no encontrado'], 404);
        }

        if($servicio->nombre !== $request->nombre){
            $request->validate([
                'nombre' => 'required|string|max:255|unique:servicios,nombre,' . $id,
            ]);
        }

        $servicio->update(['nombre' => $request->nombre]);
        return response()->json($servicio, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servicio = Servicio::find($id);
        if (!$servicio) {
            return response()->json(['error' => 'Servicio no encontrado'], 404);
        }

        $servicio->delete();
        return response()->json(['mensaje' => 'Servicio eliminado correctamente'], 200);
    }


    //version simple
    public function getAll(){
        $servicios = Servicio::all();
        return response()->json(ServicioBasicResource::Collection($servicios));
    }

    public function getByCategoria($id){
        $servicios = Categoria::find($id)->servicios;
        return response()->json(ServicioBasicResource::Collection($servicios));
    }
}
