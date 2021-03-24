<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Http\Requests\UpdateMisClienteRequest;
use App\Models\Cliente;
use App\Models\User;
use Illuminate\Http\Request;

class MiclienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sesion = session()->getId();
        $misclientes = Cliente::join('sessions', 'sessions.user_id', '=', 'clientes.user_id')->where('sessions.id', '=', $sesion)->select('clientes.*')->get();
        return view('misclientes.index', compact('misclientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('id', 'name', 'surname');
        return view('misclientes.create', ['miscliente' => new Cliente(), 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClienteRequest $request)
    {
        Cliente::create($request->validated());
        return redirect('dashboard/misclientes')->with('status', 'Cliente creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $miscliente)
    {
        $users = User::pluck('id', 'name', 'surname');
        return view('misclientes.show', ['miscliente' => $miscliente, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $miscliente)
    {
        $users = User::pluck('id', 'name', 'surname');
        return view('misclientes.edit', ['miscliente' => $miscliente, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMisClienteRequest $request, Cliente $miscliente)
    {
        $miscliente->update($request->validated());
        return redirect('dashboard/misclientes')->with('status', 'Cliente actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $miscliente)
    {
        $miscliente->delete();
        return redirect('dashboard/misclientes')->with('status', 'Cliente eliminado con éxito.');
    }
}
