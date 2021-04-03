<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propiedade;
use App\Models\User;

class WebController extends Controller
{
    public function propiedades()
    {
        $propiedades = Propiedade::orderBy('created_at', 'desc')->where('estado', '=', 'Activo')->get();
        return view('vista-cliente.properties', compact('propiedades'));
    }
	
	public function agentes()
    {
        $users = User::orderBy('created_at', 'desc')->where('estado', '=', 'Activo')->get();
        return view('vista-cliente.agent', compact('users'));
    }
}
