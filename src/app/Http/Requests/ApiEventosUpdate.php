<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiEventosUpdate extends FormRequest
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
            'fecha' => 'date|after:today',
            'descripcion' => 'string|max:300',
            'imagen' => 'max:10000',
            'pdf' => 'max:10000',
        ];
    }

    public function messages() {
        return [
            'fecha.after' => 'La fecha del evento tiene que ser posterior a hoy',
            'descripcion' => 'La descripcion no puede superar los 300 carácteres',
            'imagen.max' => 'La URL es demasiado larga',
            'pdf.max' => 'La URL es demasiado larga'
        ];
    }
}
