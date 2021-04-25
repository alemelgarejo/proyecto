<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePropiedadeRequest;
use App\Http\Requests\UpdatePropiedadeRequest;
use App\Models\Propiedade;
use App\Models\Propietario;
use Illuminate\Http\Request;

class PropiedadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('propiedades.index', [
			'propiedades'  => Propiedade::all()
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('propiedades.create', [
			'propiedade' => Propiedade::make(),
			'propietarios' => Propietario::pluck('id', 'name', 'surname')
		]);
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
        return redirect('dashboard/propiedades')->with('status', 'Propiedad creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Propiedade  $Propiedade
     * @return \Illuminate\Http\Response
     */
    public function show(Propiedade $propiedade)
    {
        $propietarios = Propietario::pluck('id', 'name', 'surname');
        return view('propiedades.show', ['propiedade' => $propiedade, 'propietarios' => $propietarios]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Propiedade  $Propiedade
     * @return \Illuminate\Http\Response
     */
    public function edit(Propiedade $propiedade)
    {
        return view('propiedades.edit', [
			'propiedade' => $propiedade, 
			'propietarios' => Propietario::pluck('id', 'name', 'surname')
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Propiedade  $Propiedade
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePropiedadeRequest $request, Propiedade $propiedade)
    {
        $propiedade->update($request->all()/* + ['user_id' => auth()->id()]*/);
        return redirect('dashboard/propiedades')->with('status', 'Propiedad actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Propiedade  $Propiedade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Propiedade $propiedade)
    {
        $propiedade->delete();
        return redirect('dashboard/propiedades')->with('status', 'Propiedad eliminada con éxito.');
    }
}
