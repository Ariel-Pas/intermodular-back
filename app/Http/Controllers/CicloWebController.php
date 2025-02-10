<?php

namespace App\Http\Controllers;

use App\Models\AreasCiclo;
use Illuminate\Http\Request;
use App\Models\Ciclo;

class CicloWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $areas = AreasCiclo::with('ciclos')->get();

        return view('ciclos.ciclos', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $areas = AreasCiclo::all();
        $ciclo = null;
        return view('ciclos.create', compact(['areas', 'ciclo']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'=>'required',
            'area' => 'required|exists:areasciclos,id'
        ]);
        $datos = ['nombre' => $request->nombre, 'areasciclo_id'=> $request->area];

        $ciclo = new Ciclo($datos);
        $ciclo->save();
        return redirect()->route('ciclos.index')->with('msg','Ciclo '.$request->nombre.'creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $areas = AreasCiclo::all();
        $ciclo = Ciclo::find($id);
        return view('ciclos.create', compact(['areas', 'ciclo']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nombre'=>'required',
            'area' => 'required|exists:areasciclos,id'
        ]);
        $datos = ['nombre' => $request->nombre, 'areasciclo_id'=> $request->area];
        $ciclo = Ciclo::findOrFail($id);
        $ciclo->update($datos);

        return redirect()->route('ciclos.index')->with('msg','Ciclo '.$request->nombre.'actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Ciclo::findOrFail($id)->delete();
        return redirect()->route('ciclos.index')->with('msg','Ciclo eliminado correctamente');

    }
}
