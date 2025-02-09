<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CentroRequest extends FormRequest
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
            'nombre' => 'required|min:5',
            'email' => 'required|email',
            'telefono' => 'required|min:8|regex:/[0-9]{9}/',
            'direccion' => 'required',
            'provincia' => 'required|numeric',
            'poblacion' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'Introduce un nombre de centro',
            'nombre.min' => 'Mínimo 5 caracteres',
            'password.required' => 'Introduce una constraseña',
            'password.regex' => 'La contraseña debe tener mayúsculas, minúsculas y núemros',
            'password.min' => 'Mínimo 8 caracteres',
            'provincia.numeric' => 'Elige una provincia',
            'poblacion.numeric' => 'Elige una población',
            'required' => 'Campo requerido',
            'min' => 'Este campo no cumple con el tamaño mínimo',
            'regex' => 'Formato inválido',

        ];
    }
}
