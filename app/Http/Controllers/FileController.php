<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Propiedade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2(Propiedade $propiedade)
    {
        $files = File::where('propiedad_id', '=', $propiedade->id)->get();
        return view('files.index', compact('files'), compact('propiedade'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create2(Propiedade $propiedade)
    {
        return view('files.create', compact('propiedade'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request, Propiedade $propiedade)
    {
        $request->validate([
            'file' => 'required|image|max:4096'
        ]);
        $imagenes = $request->file('file')->store('public/propiedades');
        $url = Storage::url($imagenes);

        File::create([
            'url' => $url,
            'propiedad_id' => $propiedade->id
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $url = str_replace('storage', 'public', $file->url);
        Storage::delete($url);
        $file->delete();
        return redirect()->back()->with('status', 'Imágen eliminada con éxito.');
    }
}
