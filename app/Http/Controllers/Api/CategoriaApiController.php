<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CategoriaApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Categoria::with('servicios')->get(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validarDatos = $request->validate([
            'nombre' => 'required|string|max:255',
            'servicios' => 'array',
            'servicios.*' => 'exists:servicios,id'
        ]);

        $categoria = Categoria::create($validarDatos);

        if ($request->has('servicios')) {
            $categoria->servicios()->sync($request->servicios);
        }

        return response()->json($categoria, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::with('servicios')->find($id);
        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }
        return response()->json($categoria, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        $validado = $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categorias')->ignore($categoria->id)
            ],
            'servicios' => 'sometimes|array',
            'servicios.*' => 'exists:servicios,id'
        ]);

        $categoria->update([
            'nombre' => $validado['nombre']
        ]);

        if ($request->has('servicios')) {
            $categoria->servicios()->sync($request->servicios);
        }

        return response()->json($categoria, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::find($id);
        if (!$categoria) {
            return response()->json(['error' => 'Categoría no encontrada'], 404);
        }

        $categoria->delete();
        return response()->json(['mensaje' => 'Categoría eliminada correctamente'], 200);
    }


    //versión sin relaciones
    public function getAll(){
        return response()->json(Categoria::all(), 200);
    }

    
}
