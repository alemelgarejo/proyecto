<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrdeneRequest extends FormRequest
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
            'cliente_id' => ['required'],
            'fecha' => ['required'],
            'ciudad' => 'required',
            'tipo_orden' => ['required'],
            'tipo_propiedad' => ['required'],
            'precio_minimo' => ['required'],
            'precio_maximo' => ['required'],
            'superficie_minima' => ['nullable'],
            'superficie_maxima' => ['nullable'],
            'dormitorio_minimo' => ['nullable'],
            'dormitorio_maximo' => ['nullable'],
            'planta' => ['nullable', 'numeric'],
            'numero_maximo_plantas' => ['nullable', 'numeric'],
            'amueblado' => ['nullable'],
            'ascensor' => ['nullable'],
            'garaje' => ['nullable'],
            'terraza' => ['nullable'],
            'patio' => ['nullable'],
            'calefaccion' => ['nullable'],
            'aire_acondicionado' => ['nullable'],
            'piscina' => ['nullable'],
            'jardin' => ['nullable'],
            'acceso_minusvalidos' => ['nullable'],
            'situacion' => ['nullable'],
            'estado_conservacion' => ['nullable'],
            'necesita_prestamo' => ['nullable'],
            'observaciones' => ['nullable', 'string', 'max:500'],
        ];
    }
}
