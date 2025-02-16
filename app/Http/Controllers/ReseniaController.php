<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReseniaRequest;
use Illuminate\Http\Request;
use App\Models\Resenia;
use App\Models\Empresa;
use Barryvdh\DomPDF\Facade\Pdf;

class ReseniaController extends Controller
{

    public function downloadPdf() {
        $resenias = Resenia::with(['pregunta', 'centro', 'empresa'])->get();
        $pdf = Pdf::loadView('resenias.pdf', compact('resenias'));
        return $pdf->download('resenias.pdf');
    }

    /**
     * Display a listing of the resource.
     */

    public function index($tipo = null)
    {
        if ($tipo) {
            $resenias = Resenia::where('formulario_id', $tipo)->get();
        } else {
            $resenias = Resenia::all();
        }

        $empresasConResenias = $resenias->unique('empresa_id')->pluck('empresa_id');

        $empresas = Empresa::whereIn('id', $empresasConResenias)->paginate(10);

        return view('resenias.index', compact('empresas', 'tipo'));
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
    public function store(ReseniaRequest $request)
    {
      //
    }


    /**
     * Display the specified resource.
     */

    public function show($empresaId)
{
    $empresa = Empresa::findOrFail($empresaId);

    $resenias = Resenia::where('empresa_id', $empresaId)->paginate(10);

    return view('resenias.show', compact('empresa', 'resenias'));
}


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($empresaId)
    {
        $empresa = Empresa::findOrFail($empresaId);
        return view('resenias.edit', compact('empresa'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $empresaId)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $empresa = Empresa::findOrFail($empresaId);
        $empresa->nombre = $request->nombre;
        $empresa->save();

        return redirect()->route('resenias.index')->with('success', 'Nombre de la empresa actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Empresa::findOrFail($id)->delete();
        return redirect()->route('resenias.index');
    }
}
