<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StoreUserRequest extends FormRequest
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
     * Get the validation rules tat apply to the request.
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'], //editar con lo aprendido
            'dni' => ['required', 'string', 'max:9', 'min:9', 'unique:users'],
            'telefono' => ['required', 'string', 'max:9', 'min:9', 'unique:users'],
            'fecha_nacimiento' => ['required', 'date'],
            'password' => ['required', 'min:8', 'string', 'confirmed'],
        ];
    }
}
