<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AreasCiclo;
use App\Models\Ciclo;

class CicloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ciclos = Ciclo::with('area:id')->get();
        return response()->json($ciclos);
    }

    public function ciclosPorArea($area){
        $ciclos = Ciclo::with('area:id')->where('areasciclo_id', '=', $area)->get();
        return response()->json($ciclos);
    }

    public function getAreas()
    {
        $areas = AreasCiclo::all();
        return response()->json($areas);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
