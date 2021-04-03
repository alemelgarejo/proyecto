<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropiedadeRequest extends FormRequest
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
            'propietario_id' => ['required'],
            'estado' => ['required'],
            'valoracion' => 'nullable',
            'tipo' => ['required', 'string', 'max:40', 'min:1'],
            'tipo_interes' => ['required', 'string', 'max:255', 'min:1'],
            'direccion' => ['required', 'string', 'max:250', 'min:2', 'unique:propiedades'],
            'ciudad' => 'required|string|max:50',
            'provincia' => 'required|string|max:50',
            'superficie' => 'required|numeric',
            'google_maps' => 'required|string|max:40',
        ];
    }
}
