<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Centro;
use App\Models\Ciclo;

use App\Http\Requests\SolicitudRequest;
use Flogti\SpanishCities\Models\Province;
use Flogti\SpanishCities\Models\Community;
use Flogti\SpanishCities\Models\Town;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use \Exception;
use Barryvdh\DomPDF\Facade\Pdf;


class SolicitudController extends Controller
{
    public function downloadPdf() {
        $solicitudes = Solicitud::with(['centro', 'empresa', 'ciclos'])->get(); 
        // $solicitudes = Solicitud::all();
        $pdf = Pdf::loadView('solicitudes.pdf', compact('solicitudes'));
        return $pdf->download('solicitudes.pdf');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitudes = Solicitud::orderBy('nombreEmpresa')->paginate(10);
        return view('solicitudes.index', compact('solicitudes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centros = Centro::all();
        $ciclos = Ciclo::all();

        $provincias = Community::find(10)->provinces;
        $municipios = Town::select('id','province_id', 'name')->whereIn('province_id', ['3', '12', '46'])->get();

        $empresa = Empresa::first();

        $numero_puestos = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        // $solicitud = Solicitud::first();
        return view('solicitudes.create', compact(['centros', 'ciclos', 'numero_puestos', 'empresa',  'provincias', 'municipios']));
    }


    /**
     * Store a newly created resource in storage.
     */

    public function store(SolicitudRequest $request) {
        $empresa = Empresa::where('cif', $request->cif)->first();
        // dd($empresa);
        if (!$empresa) {
            $empresa = Empresa::create([
                'nombre' => $request->nombreEmpresa,
                'cif' => $request->cif,
                'actividad' => $request->actividad,
                'provincia' => $request->provincia,
                'localidad' => $request->localidad,
                'horario_manana' => $request->horario_comienzo,
                'horario_tarde' => $request->horario_fin,
                'email' => $request->email,
                'town_id' => 2
            ]);
        }
        $solicitud = new Solicitud([
            'nombreEmpresa' => $request->nombreEmpresa,
            'cif' => $request->cif,
            'actividad' => $request->actividad,
            'provincia' => $request->provincia,
            'localidad' => $request->localidad,
            'empresa_id' => $empresa->id,
            'email' => $request->email,
            'horario_comienzo' => $request->horario_comienzo,
            'horario_fin' => $request->horario_fin,
            'centro_id' => $request->centro_id,
            'titularidad' => $request->titularidad,
        ]);
        $solicitud->save();

        $solicitud->ciclos()->attach($request->ciclo_id, ['numero_puestos' => $request->numero_puestos]);

        return redirect()->route('solicitudes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empresa = Empresa::findOrFail($id);
        $solicitudes = $empresa->solicitudes;

        return view('solicitudes.show', compact('empresa', 'solicitudes'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Solicitud $solicitud)
    {
        $centros = Centro::all();
        $ciclos = Ciclo::all();

        $provincias = Community::find(10)->provinces;
        $municipios = Town::select('id','province_id', 'name')->whereIn('province_id', ['3', '12', '46'])->get();

        $numero_puestos = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
        $empresa = Empresa::first();

        $cicloSeleccionado = $solicitud->ciclos->first();
        $centroSeleccionado = $solicitud->centro->first();

        $cicloId = $cicloSeleccionado ? $cicloSeleccionado->id : null;
        // $centroId = $centroSeleccionado ? $centroSeleccionado->id : null;

        $numeroPuestos = $cicloSeleccionado ? $cicloSeleccionado->pivot->numero_puestos : null;

        return view('solicitudes.create', compact(
            'solicitud', 'empresa', 'centros', 'ciclos', 'provincias',
            'municipios', 'numero_puestos', 'cicloId' , 'numeroPuestos',
            'cicloSeleccionado'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SolicitudRequest $request, Solicitud $solicitud)
    {
            $validatedData = $request->validated();

            $solicitud->update([
                'nombreEmpresa' => $validatedData['nombreEmpresa'],
                'cif' => $validatedData['cif'],
                'actividad' => $validatedData['actividad'],
                'provincia' => $validatedData['provincia'],
                'localidad' => $validatedData['localidad'],
                'email' => $validatedData['email'],
                'horario_comienzo' => $validatedData['horario_comienzo'],
                'horario_fin' => $validatedData['horario_fin'],
                'centro_id' => $validatedData['centro_id'],
                'titularidad' => $validatedData['titularidad'],
            ]);

            $solicitud->ciclos()->sync([
                $validatedData['ciclo_id'] => ['numero_puestos' => $validatedData['numero_puestos']]
            ]);

            return redirect()->route('solicitudes.index')->with('success', 'Solicitud actualizada correctamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Solicitud::findOrFail($id)->delete();
        return redirect()->route('solicitudes.index');
    }
}
