<?php

namespace App\Http\Requests\Users;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use App\Http\Requests\Request;

class UpdatePasswordRequest extends Request
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
            "old_password" => "required|password_check:".$this->user->password,
            "password" => "required|confirmed|min:8"

        ];
    }

    public function messages()
    {
        return [
            'old_password.required'	=>  'El :attribute es obligatorio.',
            'old_password.password_check'	=>  'La :attribute no es igual a la que se tiene registrada.',

            'password.required'	=>'El :attribute es obligatorio.',
            'password.confirmed'	=>'La :attribute no coinciden.',
            'password.min'	=>'El :attribute debe ser mínimo de 8 caractéres',
        ];
    }


public function attributes()
{
    return [
        'old_password' => 'contraseña actual',
        'password' => 'contraseña',
    ];
}

public function failedValidation(Validator $validator) { throw new HttpResponseException(response()->json(['errors'=>$validator->errors()], 200)); }
}
