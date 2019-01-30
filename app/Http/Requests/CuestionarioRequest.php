<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CuestionarioRequest extends FormRequest
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
            'descripcion' => ['required', 'string', 'max:255'],
            'intentos' => ['required', 'integer'],
            'fecha_limite' => ['required', 'date'],
            'hora_limite' => ['required'],
            'estado' => ['required', 'string'],
        ];
    }
}
