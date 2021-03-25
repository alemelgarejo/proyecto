<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropietarioRequest;
use App\Http\Requests\UpdateMisPropietarioRequest;
use App\Http\Requests\UpdatePropietarioRequest;
use App\Models\Propietario;
use App\Models\User;
use Illuminate\Http\Request;

class MipropietarioController extends Controller
{
    public function index()
    {
        $sesion = session()->getId();
        $mispropietarios = Propietario::join('sessions', 'sessions.user_id', '=', 'propietarios.user_id')->where('sessions.id', '=', $sesion)->select('propietarios.*')->get();
        return view('mispropietarios.index', compact('mispropietarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('id', 'name', 'surname');
        return view('mispropietarios.create', ['mispropietario' => new Propietario(), 'users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropietarioRequest $request)
    {
        Propietario::create($request->validated());
        return redirect('dashboard/mispropietarios')->with('status', 'Propietario creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show(Propietario $mispropietario)
    {
        $users = User::pluck('id', 'name', 'surname');
        return view('mispropietarios.show', ['mispropietario' => $mispropietario, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function edit(Propietario $mispropietario)
    {
        $users = User::pluck('id', 'name', 'surname');
        return view('mispropietarios.edit', ['mispropietario' => $mispropietario, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMisPropietarioRequest $request, Propietario $mispropietario)
    {
        $mispropietario->update($request->validated());
        return redirect('dashboard/mispropietarios')->with('status', 'Propietario actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propietario $mispropietario)
    {
        $mispropietario->delete();
        return redirect('dashboard/mispropietarios')->with('status', 'Propietario eliminado con éxito.');
    }
}
