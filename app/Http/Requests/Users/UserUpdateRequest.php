<?php

namespace App\Http\Requests\Users;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class UserUpdateRequest extends Request
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
        $user= (array) json_decode($requestData["user"]);
        $user["info"] = (array) $user["info"];
        $user["address"] = (array) $user["address"];

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
            'photo' => 'nullable',

        ];
    }
    public function messages()
{
    return [
        'user.info.full_name.required' => 'El :attribute es obligatorio.',
        'user.email.required' => 'El :attribute es obligatorio.',
        'user.address.phone.required' => 'El :attribute es obligatorio.',
        'user.address.zip_code.required' => 'El :attribute es obligatorio.',
        'user.address.street.required' => 'La :attribute es obligatorio.',
        'user.address.street_no.required' => 'El :attribute es obligatorio.',
        'user.address.city.required' => 'El :attribute es obligatorio.',
        'user.address.neighbourhood.required' => 'El :attribute es obligatorio.',
        'user.address.state.required' => 'El :attribute es obligatorio.',
        'user.info.birth_date.required' => 'El :attribute es obligatorio.',
        'user.info.birth_date.date_format' => 'Formato de :attribute inválido.',
        'photo.image' => 'Formato de :attribute inválido.',


    ];
}

public function attributes()
{
    return [
        'user.info.full_name' => 'Nombre completo',
        'user.email' => 'Email',
        'user.address.phone' => 'Teléfono',
        'user.address.zip_code' => 'Código postal',
        'user.address.neighbourhood' => 'Colonia',
        'user.address.street' => 'Calle',
        'user.address.street_no' => 'Número de calle',
        'user.address.city' => 'Ciudad',
        'user.address.state' => 'Estado',
        'user.info.birth_date' => 'Fecha de nacimiento',
        'photo' => 'Foto de perfil'
    ];
}

public function failedValidation(Validator $validator) { throw new HttpResponseException(response()->json(['errors'=>$validator->errors()], 200)); }
}
