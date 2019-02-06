<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
		$rules = array();

		$rules['name'] = $this->validarNombre();
		$rules['email'] = $this->validarEmail();

        return $rules;
    }
	public function messages()
	{
		$mensajesNombre = $this->mensajesNombre();
		$mensajesEmail = $this->mensajesEmail();
		$mensajes = array_merge(
			$mensajesNombre,
			$mensajesEmail
		);
		return $mensajes;
	}

	protected function validarNombre(){
		return 'required|string|max:10';
	}
	protected function validarEmail(){
		return 'required|string|max:30';
	}

	protected function mensajesNombre(){
		$mensajes = array();
		$mensajes["name.required"] = 'Introduzca el nombre';
		$mensajes["name.string"] = 'Introduzca una cadena';
		$mensajes["name.max"] = 'Supera el máximo';
		return $mensajes;
	}

	protected function mensajesEmail(){
		$mensajes = array();
		$mensajes["email.required"] = 'Introduzca el nombre';
		$mensajes["email.string"] = 'Introduzca una cadena';
		$mensajes["email.max"] = 'Supera el máximo';
		return $mensajes;
	}
}
