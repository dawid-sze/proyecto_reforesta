<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventosPost extends FormRequest
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
            'nombre'=> 'required|string|max:50',
            'tipo_evento'=> 'string|max:50',
            'tipo_terreno'=> 'string|max:50',
            'ubicacion'=> 'string|max:70',
            'date' => 'required|date|after:today',
            'descripcion' => 'string|max:300',
            'imagen' => 'max:10000|mimes:jpeg,jpg,png,webp,svg'
        ];
    }
}
