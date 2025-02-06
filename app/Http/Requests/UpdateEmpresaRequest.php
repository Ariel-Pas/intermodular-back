<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmpresaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'cif' => 'required|string|size:9',
            'descripcion' => 'required|string',
            'email' => 'required|email',
            'direccion' => 'required|string',
            'horario_manana' => 'required',
            'horario_tarde' => 'required',
            'localidad' =>  'required|exists:towns,id',
            'finSemana' => 'required|boolean',
            'coordX' => 'required|numeric',
            'coordY' => 'required|numeric',
            

        ];
    }
}
