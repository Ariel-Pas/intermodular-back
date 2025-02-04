<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReseniaRequest;
use Illuminate\Http\Request;
use App\Models\Resenia;

class ReseniaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(string $id)
    {
        //
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
