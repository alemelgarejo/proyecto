<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMisClienteRequest extends FormRequest
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
            'name' => 'required|string|max:40',
            'surname' => 'required|string|max:100',
            'user_id' => ['required'],
            'dni' => 'required|string|max:9|min:9',
            'estado' => ['required'],
            'email' => 'required|string|email|max:255', //editar con lo aprendido
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'required|string|max:100|min:2',
            'ciudad' => 'required|string|max:30',
            'provincia' => 'required|string|max:30',
            'telefono' => 'required|string|max:9|min:9',
            'observaciones' => ['string'],
        ];
    }
}
