<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('events.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sesion = session()->getId();
        $user = DB::table('sessions')->where('sessions.id', '=', $sesion)->select('sessions.user_id')->get();
        $user1 = json_decode(json_encode($user[0]), true);
        $userFinal = $user1['user_id'];
        $datosEvento=request()->except(['_token', '_method']);
        $replacements = array('user_id' => $userFinal);
        $data = array_replace($datosEvento, $replacements);
        Event::create($data);
        print_r($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(/* Event $event */)
    {
        $sesion = session()->getId();
        $data['events'] = Event::join('sessions', 'sessions.user_id', '=', 'eventos.user_id')->where('sessions.id', '=', $sesion)->select('eventos.*')->get();
        //$data['events'] = Event::all();
        return response()->json($data['events']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $sesion = session()->getId();
        $user = DB::table('sessions')->where('sessions.id', '=', $sesion)->select('sessions.user_id')->get();
        $user1 = json_decode(json_encode($user[0]), true);
        $userFinal = $user1['user_id'];
        $datosEvento=request()->except(['_token', '_method']);
        $replacements = array('user_id' => $userFinal);
        $data = array_replace($datosEvento, $replacements);
        $respuesta = Event::where('id', '=', $event->id)->update($data);
        //return response()->json($respuesta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        //return response()->json($event);
    }
}
