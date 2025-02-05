<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ServicioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $servicios = Servicio::with('categorias')->get();
        return view('servicios.servicios', compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['nombre' => 'required|unique:servicios']);

        // $servicio = Servicio::create(['nombre' => $request->nombre]);
        Servicio::create(['nombre' => $request->nombre]);

        $msg = 'Servicio creado';
        return redirect()->route('servicios.index')->with('msg', $msg);
    }

    /**
     * Display the specified resource.
     */
    public function show(Servicio $servicio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Servicio $servicio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $servicio = Servicio::findOrFail($id);
        $request->validate(['nombre' => 'required|unique:servicios,nombre,' . $id]);

        $servicio->update(['nombre' => $request->nombre]);

        $msg = 'Servicio actualizado.';
        return redirect()->route('servicios.index')->with('msg', $msg);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $servicio = Servicio::findOrFail($id);
        $servicio->delete();

        $msg = 'Servicio eliminado.';
        return redirect()->route('servicios.index')->with('msg', $msg);
    }
}
