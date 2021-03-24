<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropiedadeRequest;
use App\Models\Propiedade;
use App\Models\Propietario;
use Illuminate\Http\Request;

class MipropiedadeController extends Controller
{
    public function index()
    {
        $sesion = session()->getId();
        $mispropiedades = Propiedade::join('propietarios', 'propiedades.propietario_id', '=', 'propietarios.id')->join('sessions', 'propietarios.user_id', '=', 'sessions.user_id')->where('sessions.id', '=', $sesion)->select('propiedades.*')->get();
        return view('mispropiedades.index', compact('mispropiedades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $propietarios = Propietario::pluck('id', 'name', 'surname');
        return view('mispropiedades.create', ['mispropiedade' => new Propiedade(), 'propietarios' => $propietarios]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePropiedadeRequest $request)
    {
        Propiedade::create($request->validated());
        return redirect('dashboard/mispropiedades')->with('status', 'Propiedad creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propiedade  $Propiedade
     * @return \Illuminate\Http\Response
     */
    public function show(Propiedade $mispropiedade)
    {
        $propietarios = Propietario::pluck('id', 'name', 'surname');
        return view('mispropiedades.show', ['mispropiedade' => $mispropiedade, 'propietarios' => $propietarios]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propiedade  $Propiedade
     * @return \Illuminate\Http\Response
     */
    public function edit(Propiedade $mispropiedade)
    {
        $propietarios = Propietario::pluck('id', 'name', 'surname');
        return view('mispropiedades.edit', ['mispropiedade' => $mispropiedade, 'propietarios' => $propietarios]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propiedade  $Propiedade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Propiedade $mispropiedade)
    {
        $mispropiedade->update($request->all());
        return redirect('dashboard/mispropiedades')->with('status', 'Propiedad actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propiedade  $Propiedade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propiedade $mispropiedade)
    {
        $mispropiedade->delete();
        return redirect('dashboard/mispropiedades')->with('status', 'Propiedad eliminada con éxito.');
    }
}
