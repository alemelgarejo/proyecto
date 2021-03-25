<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropiedadeRequest extends FormRequest
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
                'valoracion' => 'required',
                'tipo' => ['required', 'string', 'max:40', 'min:1'],
                'direccion' => 'required|string|max:250|min:2|unique:propiedades,direccion,'.$this->route('propiedade')->id,
                'ciudad' => 'required|string|max:50',
                'provincia' => 'required|string|max:50',
                'superficie' => 'required|numeric',
                'superficie_construida' => 'nullable|numeric',
                'numero_dormitorios' => 'nullable|numeric',
                'numero_aseos' => 'nullable|numeric',
                'armarios_empotrados' => 'nullable',
                'numero_salones' => 'nullable|numeric',
                'superficie_salones' => 'nullable|numeric',
                'amueblado' => 'nullable',
                'comedor_independiente' => 'nullable',
                'superficie_comedor' => 'nullable|numeric',
                'cocina_amueblada' => 'nullable',
                'tipo_cocina' => 'nullable|string|max:50',
                'terrazas' => 'nullable|numeric',
                'superficie_terrazas' => 'nullable|numeric',
                'balcon' => 'nullable',
                'superficie_balcon' => 'nullable|numeric',
                'patio' => 'nullable',
                'superficie_patio' => 'nullable|numeric',
                'ubicacion_patio' => 'nullable|string|max:40',
                'situacion' => 'nullable|string|max:40',
                'altura_techo' => 'nullable|numeric',
                'garaje' => 'nullable',
                'superficie_garaje' => 'nullable|numeric',
                'trastero' => 'nullable',
                'superficie_trastero' => 'nullable|numeric',
                'sotano' => 'nullable',
                'superficie_sotano' => 'nullable|numeric',
                'calefaccion' => 'nullable',
                'tipo_calefaccion' => 'nullable|string|max:40',
                'aire_acondicionado' => 'nullable',
                'tipo_aire_acondicionado' => 'nullable|string|max:40',
                'tipo_edificio' => 'nullable|string|max:40',
                'numero_plantas' => 'nullable|numeric',
                'planta' => 'nullable|numeric',
                'ascensor' => 'nullable',
                'urbanizacion' => 'nullable',
                'jardin' => 'nullable',
                'superficie_jardin' => 'nullable|numeric',
                'fecha_construccion' => 'nullable|date|max:10',
                'estado_conservacion' => 'string|max:40',
                'latitud' => 'nullable|numeric',
                'longitud' => 'nullable|numeric',
                'google_maps' => 'required|string|max:40'
        ];
    }
}
