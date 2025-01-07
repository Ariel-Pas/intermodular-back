<?php

namespace App\Http\Controllers;

use App\Http\Requests\CentroRequest;
use Illuminate\Http\Request;
use App\Models\Centro;
use App\Models\Empresa;

class CentrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $empresas = Empresa::all();
       //$E = new Empresa();
        $centros = Centro::get();
        $centros = Centro::with('empresas')->get();

        return view('centros.centros', compact('centros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $empresas = Empresa::all();
        $centro = new Centro();
        return view('centros.create', compact('empresas', 'centro'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CentroRequest $request)
    {
       //dd($errors);
       $datos = $request->except('empresas, password');
       $centro = new Centro($datos);
        $centro->password = md5($request->password);
       $centro->save();
       $centro->empresas()->sync($request->empresas);
       return redirect()->route('centros.index')->with('msg', "Centro $request->nombre creado");
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
        $centro = Centro::with('empresas')->findOrFail($id);
        $empresas = Empresa::all();
        //dd($centro->empresas);
        return view('centros.create', compact('centro', 'empresas'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $datos = $request->except('empresas');
       $centro = Centro::findOrFail($id);
       //dd($request->poblacion);
       //actualizar los datos propios no fk
        $centro->update($datos);
       $centro->empresas()->sync($request->empresas);
       return redirect()->route('centros.index')->with('msg', "Centro $request->nombre actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
