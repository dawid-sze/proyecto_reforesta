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
      return  [
            'nick.required' => 'El nick es obligatorio',
            'nick.max' => 'El nick no puede superar los 20 carácteres',
            'nombre.requiered' => 'El nombre es obligatorio',
            'nombre.max' => 'El nombre no puede superar los 20 carácteres',
            'apellidos.max' => 'El apellido no puede superar los 50 carácteres',
            'password.requiered' => 'La contraseña es obligatoria',
            'password.max' => 'La contraseña no puede superar los 64 carácteres',
            'email.max' => 'El email no puede superar los 50 carácteres',
            'avartar.max' => 'El avatar no puede superar los 300 carácteres'
      ];
    }
}
