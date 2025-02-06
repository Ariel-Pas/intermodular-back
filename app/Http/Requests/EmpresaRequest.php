<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            'cif' => 'required|string|size:9|unique:empresas',
            'descripcion' => 'required|string',
            'email' => 'required|email|unique:empresas',
            'direccion' => 'required|string',
            'horario_manana' => 'required',
            'horario_tarde' => 'required',
            'localidad' =>  'required|exists:towns,id',
            'finSemana' => 'required|boolean',
            'coordX' => 'required|numeric',
            'coordY' => 'required|numeric',
            'centro' => 'string|exists:centro,id',

        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Introduce un nombre de empresa',
            'provincia.numeric' => 'Elige una provincia',
            'poblacion.numeric' => 'Elige una población',
            'email.unique' => 'Este email está en uso',
            'required' => 'Campo requerido',
            'min' => 'Este campo no cumple con el tamaño mínimo',
            'regex' => 'Formato inválido',
            'size' => 'Número de caracteres incorrecto',
            'email' => 'Email no válido'
        ];
    }
}
