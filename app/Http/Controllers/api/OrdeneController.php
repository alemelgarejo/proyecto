<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ordene;
use App\Models\Cliente;

class OrdeneController extends Controller
{
    public function index() {
        $ordenes = Ordene::all();
        return response()->json($ordenes);
    }
	public function show(Ordene $ordene) {
		return response()->json($ordene);
	}
	public function store(Request $request) {
		
		// $request->validate([
		// 	'name' => 'required|string|max:40',
		// 	'surname' => 'required|string|max:100',
		// 	'user_id' => ['required'],
		// 	'dni' => ['required', 'string', 'max:9', 'min:9'],
		// 	'estado' => ['required'],
		// 	'email' => ['required', 'string', 'email', 'max:255'], //editar con lo aprendido
		// 	'fecha_nacimiento' => ['required', 'date'],
		// 	'direccion' => ['required', 'string', 'max:100', 'min:2'],
		// 	'ciudad' => 'required|string|max:30',
		// 	'provincia' => 'required|string|max:30',
		// 	'telefono' => ['required', 'string', 'max:9', 'min:9'],
		// 	'observaciones' => ['string'],
		// ]);
		$ordene = Ordene::create([
			'name' => $request->name,
            'surname' => $request->surname,
            'user_id' => $request->user_id,
            'dni' => $request->dni,
            'estado' => $request->estado,
            'email' => $request->email, //editar con lo aprendido
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
            'provincia' => $request->provincia,
            'telefono' => $request->telefono,
            'observaciones' => $request->observaciones,
			'created_at' => \Carbon\Carbon::now(),
			'updated_at' => \Carbon\Carbon::now(),
		]);
		return response()->json($ordene);
	}
	public function update(Request $request, Ordene $ordene) {
		
		// $request->validate([
		// 	'name' => 'required|string|max:40',
		// 	'surname' => 'required|string|max:100',
		// 	'user_id' => ['required'],
		// 	'dni' => 'required|string|max:9|min:9|unique:clientes,dni'.$cliente->id,
		// 	'estado' => ['required'],
		// 	'email' => 'required|string|email|max:255|unique:clientes,email'.$this->cliente->id, //editar con lo aprendido
		// 	'fecha_nacimiento' => ['required', 'date'],
		// 	'direccion' => 'required|string|max:100|min:2|unique:clientes,direccion'.$this->cliente->id,
		// 	'ciudad' => 'required|string|max:30',
		// 	'provincia' => 'required|string|max:30',
		// 	'telefono' => 'required|string|max:9|min:9|unique:clientes,telefono'.$this->cliente->id,
		// 	'observaciones' => ['string'],
		// ]);
		$ordene ->update([
			'name' => $request->name,
            'surname' => $request->surname,
            'user_id' => $request->user_id,
            'dni' => $request->dni,
            'estado' => $request->estado,
            'email' => $request->email, //editar con lo aprendido
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'direccion' => $request->direccion,
            'ciudad' => $request->ciudad,
            'provincia' => $request->provincia,
            'telefono' => $request->telefono,
            'observaciones' => $request->observaciones,
			'updated_at' => \Carbon\Carbon::now(),
		]);
		return response()->json($ordene);
	}
	public function destroy(Ordene $ordene) {
        $ordene->delete();
        return response()->json($ordene);
    }
}
