<?php

namespace App\Http\Requests\Users;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Request;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserUpdateWpRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */



//protected $dontFlash = ['password', 'password_confirmation']; campos que deseamos se pongan vacios al regresar

    public function authorize()
    {
        $requestData=$this->all();
        $user= array();
        $user["email"]= $requestData["email"];
        $user["info"] = $requestData["info"];
        $user["address"] = $requestData["address"];
        $this->merge(['user' => $user]);
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
            'user.info.full_name' => 'required|max:255',
            'user.email' => 'required|email|max:255',
            'user.address.phone' => 'required|max:10',
            'user.address.street' => 'required|max:255',
            'user.address.street_no' => 'required|max:255',
            'user.address.zip_code' => 'required|max:6',
            'user.address.neighbourhood' => 'required|max:255',
            'user.address.city' => 'required|max:255',
            'user.address.state' => 'required|max:255',
            'user.info.birth_date' => 'required|date_format:"Y-m-d"|max:50',
            "old_password" => "required|password_check:".$this->user->password,

            "password" => "required|confirmed|min:8"

        ];
    }
    public function messages()
{
    return [
        'user.info.full_name.required' => 'El :attribute es obligatorio.',
        'user.email.required' => 'El :attribute es obligatorio.',
        'user.address.street.required' => 'La :attribute es obligatorio.',
        'user.address.street_no.required' => 'El :attribute es obligatorio.',
        'user.address.city.required' => 'El :attribute es obligatorio.',
        'user.address.state.required' => 'El :attribute es obligatorio.',
        'user.address.phone.required' => 'El :attribute es obligatorio.',
        'user.address.zip_code.required' => 'El :attribute es obligatorio.',
        'user.address.neighbourhood.required' => 'El :attribute es obligatorio.',
        'user.address.state.required' => 'El :attribute es obligatorio.',
        'user.info.birth_date.required' => 'El :attribute es obligatorio.',
        'user.info.birth_date.date_format' => 'Formato de :attribute inválido.',

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
        'info.full_name' => 'Nombre completo',
        'email' => 'Email',
        'address.phone' => 'Teléfono',
        'address.zip_code' => 'Código postal',
        'address.neighbourhood' => 'Colonia',
        'address.street' => 'Calle',
        'address.street_no' => 'Número de calle',
        'address.city' => 'Ciudad',
        'address.state' => 'Estado',
        'info.birth_date' => 'Fecha de nacimiento',
        'photo' => 'nullable',
        'old_password' => 'contraseña actual',
        'password' => 'contraseña',
    ];
}

public function failedValidation(Validator $validator) {
    throw new HttpResponseException(response()->json(['errors'=>$validator->errors()], 200)); }
}
