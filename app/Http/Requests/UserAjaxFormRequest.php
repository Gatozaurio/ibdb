<?php

namespace App\Http\Requests;

use App\Http\Requests\UserFormRequest;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;

class UserAjaxFormRequest extends UserFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = array();

		if( $this->exists('name') ){
			$rules['name'] = $this->validarNombre();
		}

		return $rules;

    }

	protected function failedValidation($validator)
	{
		// Devuelve los errores de validación
		$errors = $validator->errors();
		$response = new JsonResponse([
			'name' => $errors->get('name'),
			// 'email' => $errors->get('email')
		]);
		throw new ValidationException($validator, $response);
	}
}
