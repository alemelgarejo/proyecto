<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'comercial' => 'required|string|max:6',
            'estado' => ['required'],
            'role_id' => ['required'],
            'email' => 'required|string|email|max:255|unique:users,email,'.$this->route('user')->id, //editar con lo aprendido
            'dni' => 'required|string|max:9|min:9|unique:users,dni,'.$this->route('user')->id,
            'telefono' => 'required|string|max:9|min:9|unique:users,telefono,'.$this->route('user')->id,
            'fecha_nacimiento' => ['required', 'date'],
        ];
    }
}
