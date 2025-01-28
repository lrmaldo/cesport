<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistroRequest extends FormRequest
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
             /* 'nombre_completo' => ['required', 'string', 'max:255'],
                'telefono' => ['required', 'string', 'max:10'],
                'correo_electronico' => ['required', 'string', 'email', 'max:255'],
                'categoria' => ['required', 'string', 'max:255'],
                'genero' => ['required', 'string', 'max:255'],
                'captura_transferencia' => ['file', 'mimes:jpeg,png,jpg,pdf', 'max:2048'], */

        ];
    }
}
