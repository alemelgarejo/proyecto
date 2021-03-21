<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropietarioRequest;
use App\Http\Requests\UpdatePropietarioRequest;
use App\Models\Propietario;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $propietarios = Propietario::all();
        return view('propietarios.index', compact('propietarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('id', 'name', 'surname');
        return view('propietarios.create', ['propietario' => new Propietario(), 'users' => $users]);
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
        return redirect('dashboard/propietarios')->with('status', 'Propietario creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function show(Propietario $propietario)
    {
        $users = User::pluck('id', 'name', 'surname');
        return view('propietarios.show', ['propietario' => $propietario, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function edit(Propietario $propietario)
    {
        $users = User::pluck('id', 'name', 'surname');
        return view('propietarios.edit', ['propietario' => $propietario, 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropietarioRequest $request, Propietario $propietario)
    {
        $propietario->update($request->validated());
        return redirect('dashboard/propietarios')->with('status', 'Propietario actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propietario  $propietario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propietario $propietario)
    {
        $propietario->delete();
        return redirect('dashboard/propietarios')->with('status', 'Propietario eliminado con éxito.');
    }
}
