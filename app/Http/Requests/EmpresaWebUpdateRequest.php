<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmpresaWebUpdateRequest extends FormRequest
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
            'cif' => ['required','string','size:9', Rule::unique('empresas')->ignore($this->route('empresa'))],
            'descripcion' => 'required|string',
            'email' => ['required' , 'email', Rule::unique('empresas')->ignore($this->route('empresa'))],
            'direccion' => 'required|string',
            'apManana' => 'required',
            'apTarde' => 'required',
            'poblacion' =>  'required|exists:towns,id',
            'finSemana' => 'boolean',
            'coordX' => 'required|numeric',
            'coordY' => 'required|numeric',

            'servicios' =>  'required|array|min:1',
            'imagen' => 'image'

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
            'email' => 'Email no válido',
            'numeric' => 'Introduce un valor numérico',
            'unique' => 'Este valor ya está registrado'
        ];
    }
}
