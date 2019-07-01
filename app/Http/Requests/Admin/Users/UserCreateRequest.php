<?php

namespace App\Http\Requests\Admin\Users;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests\Request;

class UserCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */

//protected $redirectRoute = 'admin.home';

//protected $dontFlash = ['password', 'password_confirmation']; campos que deseamos se pongan vacios al regresar

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
            'full_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
        ];
    }
    public function messages()
{
    return [
        'full_name.required' => 'El :attribute es obligatorio.',
        'email.required' => 'El :attribute es obligatorio.'
    ];
}

public function attributes()
{
    return [
        'full_name' => 'Nombre Completo',
        'email' => 'Email'
    ];
}
//public function failedValidation(Validator $validator) { throw new HttpResponseException(response()->json($validator->errors(), 200)); }
}
