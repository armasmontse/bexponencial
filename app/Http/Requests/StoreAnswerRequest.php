<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class StoreAnswerRequest extends Request
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
    public function rules(){
        return [
            'questionId' => 'required|integer',
            'file_answer' => 'required_without_all:answer_text,answer_url|file|mimes:jpeg,pdf,png',
            'answer_text' => 'required_without_all:file_answer,answer_url|max:1000|min:15|string',
            'answer_url' => 'required_without_all:answer_text,file_answer|active_url|max:500'
        ];
    }

     public function messages(){
        return [
            'questionId.integer' => 'El :attribute debe ser un valor entero.',
            'questionId.required' => 'El :attribute es obligatorio.',
            'file_answer.required' => 'El :attribute es obligatorio',
            'file_answer.file' => 'El :attribute debe ser un archivo válido.',
            'file_answer.image' => 'El :attribute debe ser una imagen.',
            'file_answer.required_without_all' => 'Para enviar la respuesta, es necesario llenar algún campo del formulario',
            'answer_text.required' => 'El :attribute es obligatorio',
            'answer_text.max' => 'El :attribute debe tener como máximo 1000 caracteres.',
            'answer_text.min' => 'El :attribute debe tener como mínimo 30 caracteres.',
            'answer_text.string' => 'El :attribute debe ser una cadena de texto.',
            'answer_text.required_without_all' => 'Para enviar la respuesta, es necesario llenar algún campo del formulario',
            'answer_url.max' => 'La :attribute debe tener como máximo 1000 caracteres.',
            'answer_url.active_url' => 'La :attribute debe ser válida.',
            'answer_url.required_without_all' => 'Para enviar la respuesta, es necesario llenar algún campo del formulario'
        ];
    }

    public function attributes(){
        return [
            'questionId' => 'identificador de la pregunta',
            'file_answer' => 'documento',
            'answer_text' => 'texto',
            'answer_url' => 'liga'
        ];
    }

    public function failedValidation(Validator $validator) { throw new HttpResponseException(response()->json(['errors'=>$validator->errors()], 200)); }
}
