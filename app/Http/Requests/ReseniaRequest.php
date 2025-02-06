<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReseniaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'respuesta' => 'required',
            'fecha' => 'date',
            'pregunta_id' => 'required|integer',
            'formulario_id' => 'required|integer',
            'centro_id' => 'required|integer',
            'empresa_id' => 'required|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'respuesta.required' => 'La respuesta es obligatoria.',
            'fecha.date' => 'La fecha debe ser un formato válido.',
            'pregunta_id.required' => 'El ID de la pregunta es obligatorio.',
            'pregunta_id.integer' => 'El ID de la pregunta debe ser un número entero.',
            'formulario_id.required' => 'El ID del formulario es obligatorio.',
            'formulario_id.integer' => 'El ID del formulario debe ser un número entero.',
            'centro_id.required' => 'El ID del centro es obligatorio.',
            'centro_id.integer' => 'El ID del centro debe ser un número entero.',
            'empresa_id.required' => 'El ID de la empresa es obligatorio.',
            'empresa_id.integer' => 'El ID de la empresa debe ser un número entero.',
        ];
    }
}
