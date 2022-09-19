<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AuthRequest extends Request
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
            "name" =>  "required|",
            "password"  =>  "required"
        ];
    }
    
    public function messages()
	{
	    return [
	        'name.required' => 'El campo nombre es requerido!',
            'password.required' => 'El campo contraseña es requerido!'
	    ];
	}
    
}
