<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrdeneRequest;
use App\Http\Requests\UpdateOrdeneRequest;
use App\Models\Cliente;
use App\Models\Ordene;
use Illuminate\Http\Request;

class OrdeneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function __construct() {
		 $this->middleware('checkRole')->only('index', 'delete');	
	}
	
    public function index()
    {
        $ordenes = Ordene::all();
        return view('ordenes.index', compact('ordenes'));
    }
    // public function index2(Ordene $ordene)
    // {
    //     $clientes = Cliente::pluck('id', 'name', 'surname');
    //     $ordenes = Ordene::join('clientes', 'ordenes.cliente_id', '=', 'clientes.id')->where('clientes.id', '=', $ordene->cliente_id);
    //     dd($ordenes);
    //     return view('ordenes.index2', compact('ordenes'), compact('clientes'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Cliente::pluck('id', 'name', 'surname');
        return view('ordenes.create', ['ordene' => new Ordene(), 'clientes' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrdeneRequest $request)
    {
        Ordene::create($request->validated());
        return redirect('dashboard/ordenes')->with('status', 'Órden creada con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ordene  $ordene
     * @return \Illuminate\Http\Response
     */
    public function show(Ordene $ordene)
    {
        $clientes = Cliente::pluck('id', 'name', 'surname');
        return view('ordenes.show', ['ordene' => $ordene, 'clientes' => $clientes]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ordene  $ordene
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordene $ordene)
    {
        $clientes = Cliente::pluck('id', 'name', 'surname');
        return view('ordenes.edit', ['ordene' => $ordene, 'clientes' => $clientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ordene  $ordenes
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrdeneRequest $request, Ordene $ordene)
    {
        $ordene->update($request->validated());
        return redirect('dashboard/ordenes')->with('status', 'Órden actualizada con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ordene  $ordene
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordene $ordene)
    {
        $ordene->delete();
        return redirect('dashboard/ordenes')->with('status', 'Órden eliminada con éxito.');
    }
}
