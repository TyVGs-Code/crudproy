<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstruccioneRequest extends FormRequest
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
			'Id_ins' => 'required',
			'Codigo' => 'required|string',
			'Nomins' => 'required|string',
			'FechRev' => 'required',
			'FechEmi' => 'required',
			'FechProx' => 'required',
			'EstRev' => 'required',
			'ResRev' => 'required|string',
			'ResEla' => 'required|string',
			'ResApr' => 'required|string',
			'ClasInstr' => 'required',
			'Status' => 'required|string',
			'Nivel' => 'required',
			'Programa' => 'required|string',
			'Lista' => 'required|string',
			'Cuestionario' => 'required|string',
			'Guia' => 'required|string',
			'Ciclo' => 'required|string',
			'Diagrama' => 'required|string',
			'Desarrollo' => 'required|string',
			'Procedimiento' => 'required|string',
			'Portada' => 'required|string',
			'ins_TP' => 'required',
        ];
    }
}
