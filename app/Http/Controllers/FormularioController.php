<?php

namespace App\Http\Controllers;
use App\Models\Formulario;
use Illuminate\Http\Request;
use App\Models\Token;

class FormularioController extends Controller
{

public function mostrarFormulario($id)
    {
        $formulario = Formulario::find($id);
        if ($formulario) {
            $preguntas = $formulario->preguntas; // agregar ->with para que devuelva todo junto los formularios con las preguntas
            return response()->json($preguntas);
        }
        return response()->json(['error' => 'Formulario no encontrado'], 404);
    }
}


