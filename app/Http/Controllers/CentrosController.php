<?php

namespace App\Http\Controllers;

use App\Http\Requests\CentroRequest;
use App\Http\Requests\CentroUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Centro;
use App\Models\Ciclo;
use App\Models\Empresa;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Flogti\SpanishCities\Models\Community;
use Flogti\SpanishCities\Models\Town;
use Barryvdh\DomPDF\Facade\Pdf;
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
        $provincias = Community::find(10)->provinces;
        $municipios = Town::select('id','province_id', 'name')->whereIn('province_id', ['3', '12', '46'])->get();
        $ciclos = Ciclo::all();
        $empresas = Empresa::all();
        $centro = new Centro();
        return view('centros.create', compact('empresas', 'centro', 'ciclos', 'provincias', 'municipios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CentroRequest $request)
    {
       //dd($errors);
       $datos = $request->except('empresas, ciclos');
       $centro = new Centro($datos);
       $centro->town_id = $request->poblacion;
       $centro->save();
       $centro->empresas()->sync($request->empresas);
       $centro->ciclos()->sync($request->ciclos);
       return redirect()->route('centros.index')->with('msg', "Centro $request->nombre creado");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $centro = Centro::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $provincias = Community::find(10)->provinces;
        $municipios = Town::select('id','province_id', 'name')->whereIn('province_id', ['3', '12', '46'])->get();
        $ciclos = Ciclo::all();
        $centro = Centro::with('empresas')->findOrFail($id);
        $empresas = Empresa::all();
        return view('centros.create', compact('centro', 'empresas', 'ciclos', 'provincias', 'municipios'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CentroUpdateRequest $request, string $id)
    {

        $datos = $request->except('empresas', 'ciclos');
       $centro = Centro::findOrFail($id);
       //actualizar los datos propios no fk
        $centro->update($datos);
        $centro->town_id = $request->poblacion;
        $centro->save();
       $centro->empresas()->sync($request->empresas);

       $centro->ciclos()->sync($request->ciclos);
       return redirect()->route('centros.index')->with('msg', "Centro $request->nombre actualizado");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $centro = Centro::findOrFail($id);
        $centro->delete();
        return redirect()->route('centros.index')->with('msg', "Centro $centro->nombre eliminado");
    }

    public function asociarNotaAEmpresa(Request $request)
    {
        //obtener
        $centro = Centro::findOrFail($request->centro);
        $centro->empresas()->updateExistingPivot($request->empresa, ['notas'=>$request->nota]);
    }


    public function generarPDF(){
        $centros = Centro::with('empresas:nombre')->get();
        //dd($centros);
        $pdf = Pdf::loadView('centros.pdf', ['centros' =>$centros]);
        return $pdf->download('empresas-pdf');
    }

}
