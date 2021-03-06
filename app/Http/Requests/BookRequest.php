<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        return [
            'title'         => 'required|min:3',
			'publisher' 	=> 'required|exists:publishers,id',
            'author'        => ['required','min:3'],
            'description'    => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required'=> 'El :attribute es requerido.',
            'title.min' => 'El :attribute debe tener al menos 3 caracteres',
            'author.required'=> 'El :attribute es requerido.',
            'author.min'    => 'El :attribute debe tener al menos 3 caracteres',
            'description.required'=> 'La :attribute es requerida.'
        ];
    }

    public function attributes()
    {
        return [
            'title'     => 'título del libro',
            'author'    => 'autor del libro',
            'description' => 'descripción del libro'
        ];
    }
}
