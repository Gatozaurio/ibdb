<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherRequest extends FormRequest
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
            'name'	=> 'required|min:3',
			'address' => 'required|min:4',
			'web' => 'required|min:6',
			'email' => 'required|min:5'
        ];
    }

	public function messages()
	{
		return [
			'name.required' => 'The :attribute is required.',
			'name.min' => 'The :attribute must be greater than 3 characters.',
			'address.required' => 'The :attribute is required.',
			'address.min' => 'The :attribute must be greater than 4 characters.',
			'web.required' => 'The :attribute is required.',
			'web.min' => 'The :attribute must be greater than 6 characters.',
			'email.required' => 'The :attribute is required.',
			'email.required' => 'The :attribute must be greater than 5 characters.'
		];
	}

	public function attributes()
	{
		return [
			'name' => "name of the publisher",
			'address' => "address of the publisher",
			'web' => "web of the publisher",
			'email' => "email of the publisher"
		];
	}
}
