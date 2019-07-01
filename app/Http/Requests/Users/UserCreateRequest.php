<?php

namespace App\Http\Requests\Users;
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

protected $redirectRoute = 'client.home';

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
            'names' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            "password" => "required|min:8"
        ];
    }
    public function messages()
{
    return [
        'names.required' => 'El :attribute es obligatorio.',
        'last_names.required' => 'El :attribute es obligatorio.',
        'email.required' => 'El :attribute es obligatorio.',
        'password.required' => 'Añade un :attribute al producto',
        'password.min' => 'El :attribute debe ser mínimo de 8 caractéres'
    ];
}

public function attributes()
{
    return [
        'names' => 'Nombre(s)',
        'last_names' => 'Apellidos',
        'email' => 'Email',
        'password' => 'Contraseña',
    ];
}
public function failedValidation(Validator $validator) { throw new HttpResponseException(response()->json($validator->errors(), 200)); }
}
