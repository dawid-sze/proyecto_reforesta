<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        
        return [
            'nick'=> 'required|string|max:20',
            'nombre'=> 'required|string|max:20',
            'apellidos'=> 'string|max:50',
            'password'=> 'required|string|max:64',
            'email' => 'required|string|max:50',
            'avatar' => 'string|max:300'
        ];
    }
    public function messages(){
        [
            'nick.required' => 'El nick es obligatorio',
            'nick.string' => 'El '
        ]
    }
}
