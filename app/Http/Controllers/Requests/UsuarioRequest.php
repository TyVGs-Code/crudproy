<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
			'Id_usu' => 'required',
			'Ficha' => 'required|string',
			'Nombre' => 'required|string',
			'Appa' => 'required|string',
			'Apma' => 'required|string',
			'Nac' => 'required',
			'RFC' => 'required|string',
			'C_usu' => 'required',
			'Correo' => 'required|string',
			'Telefono' => 'required|string',
			'Password' => 'required|string',
			'Tiposangre' => 'string',
			'Vacofic' => 'required',
			'Vacprog' => 'required',
			'Jornada' => 'required',
			'Camisa' => 'required|string',
			'Pantalon' => 'required|string',
			'Zapatos' => 'required|string',
			'Condmedica' => 'required|string',
        ];
    }
}
