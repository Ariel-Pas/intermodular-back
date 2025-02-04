<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Servicio;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::with('servicios')->get();
        //CREAR VISTA
        return view('categorias.categorias', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|unique:categorias']);
        Categoria::create(['nombre' => $request->nombre]);
        $msg = 'Categoria agregada.';
        // return view('categorias.categorias', compact('msg'));
        return redirect()->route('categorias.index')->with('msg', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(['nombre' => 'required|unique:categorias,nombre']);
        Categoria::findOrFail($id)->update(['nombre' => $request->nombre]);
        $msg = 'Categoria actualizada.';
        // return view('categorias.categorias', compact('msg'));
        return redirect()->route('categorias.index')->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Categoria::findOrFail($id)->delete();
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        $msg = 'Categoria eliminada.';
        // return view('categorias.categorias', compact('msg'));
        return redirect()->route('categorias.index')->with('msg', $msg);
    }

    public function storeServicio(Request $request, $categoria_id)
    {
        $request->validate([
            'nombre' => 'required|unique:servicios,nombre,NULL,id,categoria_id,' . $categoria_id
        ]);
        Servicio::create([
            'nombre' => $request->nombre,
            'categoria_id' => $categoria_id
        ]);

        $msg = "Servicio creado.";
        // return view('categorias.categorias', compact('msg'));
        return redirect()->route('categorias.index')->with('msg', $msg);
    }

    public function updateServicio(Request $request, string $id)
    {
        $servicio = Servicio::findOrFail($id);
        $request->validate([
            'nombre' => 'required|unique:servicios,nombre,NULL,id,categoria_id,' . $servicio->categoria_id
        ]);
        $servicio->update(['nombre' => $request->nombre]);
        $msg = "Servicio actualizado.";
        // return view('categorias.categorias', compact('msg'));
        return redirect()->route('categorias.index')->with('msg', $msg);
    }

    public function destroyServicio(string $id)
    {
        // Servicio::findOrFail($id)->delete();
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();
        $msg = "Servicio eliminado.";
        // return view('categorias.categorias', compact('msg'));
        return redirect()->route('categorias.index')->with('msg', $msg);
    }
}
