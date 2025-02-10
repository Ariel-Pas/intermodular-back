<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaWebRequest extends FormRequest
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
            'apManana' => 'required',
            'apTarde' => 'required',
            'poblacion' =>  'required|exists:towns,id',
            'finSemana' => 'boolean',
            'coordX' => 'required|numeric',
            'coordY' => 'required|numeric',
            'servicios' =>  'required|array|min:1',
            'imagen' => 'required |image'

        ];
    }
}
