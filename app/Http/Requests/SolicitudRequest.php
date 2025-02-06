<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SolicitudRequest extends FormRequest
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
            'nombreEmpresa' => 'required|string',
            'actividad' => 'required|string',
            'cif' => 'required|regex:/^[A-Z][0-9]{8}$/',
            'provincia' => 'required',
            'localidad' => 'required',
            'email' => 'required|email',
            'titularidad' => 'required',
            'horario_comienzo' => 'required',
            'horario_fin' => 'required',
            'centro_id' => 'required|integer',
            'empresa_id' => 'required|integer',
        ];
    }


    public function messages(): array
    {
        return [
            'nombreEmpresa.required' => 'El nombre de la empresa es obligatorio.',
            'nombreEmpresa.string' => 'El nombre de la empresa debe ser un texto válido.',

            'actividad.required' => 'La actividad es obligatoria.',
            'actividad.string' => 'La actividad debe ser un texto válido.',

            'cif.required' => 'El CIF es obligatorio.',
            'cif.regex' => 'El CIF debe comenzar con una letra mayúscula seguida de 8 números.',

            'provincia.required' => 'La provincia es obligatoria.',
            'localidad.required' => 'La localidad es obligatoria.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección válida.',

            'titularidad.required' => 'La titularidad es obligatoria.',

            'horario_comienzo.required' => 'El horario de comienzo es obligatorio.',

            'horario_fin.required' => 'El horario de finalización es obligatorio.',

            'centro_id.required' => 'El ID del centro es obligatorio.',
            'centro_id.integer' => 'El ID del centro debe ser un número entero.',

            'empresa_id.required' => 'El ID de la empresa es obligatorio.',
            'empresa_id.integer' => 'El ID de la empresa debe ser un número entero.',
        ];
    }
}
