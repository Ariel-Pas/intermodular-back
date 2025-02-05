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
        $servicios = Servicio::all();

        return view('categorias.categorias', compact('categorias','servicios'));
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
        $categoria =  Categoria::create([
            'nombre' => $request->nombre
        ]);

        //ASOCIO LOS SERVICIOS A LA CATEGORIA
        if ($request->has('servicios')) {
            $categoria->servicios()->sync($request->servicios);
        }

        $msg = 'Categoria agregada.';
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

        $categoria = Categoria::findOrFail($id);

        if($categoria->nombre !== $request->nombre){
            $request->validate(['nombre' => 'required|unique:categorias,nombre']);
        }

        $categoria->update(['nombre' => $request->nombre]);

        //ASOCIO LOS SERVICIOS A LA CATEGORIA
        $categoria->servicios()->sync($request->servicios ?? []);

        $msg = 'Categoria actualizada.';
        return redirect()->route('categorias.index')->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        $msg = 'Categoria eliminada.';
        return redirect()->route('categorias.index')->with('msg', $msg);
    }

}
