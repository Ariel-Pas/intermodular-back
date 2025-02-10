<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReseniaRequest;
use Illuminate\Http\Request;
use App\Models\Resenia;
use App\Models\Empresa;

class ReseniaController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    // public function index()
    // {
    //     $resenias= Resenia::orderBy('pregunta_id')->paginate(10);
    //     return view('resenias.index', compact('resenias'));
    // }



    // public function index($tipo = null)
    // {
    //     if ($tipo) {
    //         $resenias = Resenia::where('formulario_id', $tipo)->paginate(10); // filtra solo por formulario_id específico
    //     } else {
    //         $resenias = Resenia::paginate(10);  // muestra todas las reseñas
    //     }

    //     return view('resenias.index', compact('resenias', 'tipo'));
    // }

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
        // dd('Solicitud recibida', $request->all());
        // $resenia = Resenia::create([
        //     'respuesta' => $request->respuesta,
        //     'fecha' => $request->fecha,
        //     'pregunta_id' => $request->pregunta_id,
        //     'formulario_id' => $request->formulario_id,
        //     'centro_id' => $request->centro_id,
        //     'empresa_id' => $request->empresa_id,
        // ]);

        // return response()->json(['message' => 'Reseña creada exitosamente', 'resenia' => $resenia], 201);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
