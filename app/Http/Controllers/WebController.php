<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Propiedade;
use App\Models\User;

class WebController extends Controller
{

    //Index

    public function index()
    {
        $propiedades = Propiedade::orderBy('created_at', 'desc')->where('estado', '=', 'Activo')->limit(4)->get();
        $propiedades1 = Propiedade::orderBy('created_at', 'desc')->where('estado', '=', 'Activo')->limit(6)->get();
        $users = User::orderBy('created_at', 'desc')->where('estado', '=', 'Activo')->get();
        return view('vista-cliente.index', compact('propiedades'), compact('propiedades1'), compact('users'));
    }


    //Propiedades

    public function propiedades()
    {
        $propiedades = Propiedade::orderBy('created_at', 'desc')->where('estado', '=', 'Activo')->get();
        return view('vista-cliente.properties', compact('propiedades'));
    }



    //Agentes

	public function agentes()
    {
        $users = User::orderBy('created_at', 'desc')->where('estado', '=', 'Activo')->get();
        return view('vista-cliente.agent', compact('users'));
    }

    //Contacto

    public function storeMessage(StoreMessageRequest $request)
    {
        Message::create($request->validated());
        return redirect()->back()->with('status', 'Mensaje enviado con éxito.');
    }

    //Login y registro
    public function login()
    {
        return view('vista-cliente.login');
    }
    public function register()
    {
        return view('vista-cliente.register');
    }
}
