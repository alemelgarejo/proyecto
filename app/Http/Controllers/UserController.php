<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserPassRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $users = User::all();
		//ddd($users);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $roles = Role::pluck('id', 'name');
        // return view('users.create', ['user' => new User(), 'roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        // User::create($request->validated([
        //         'password' => Hash::make($request['password']),
        //     ] )

        // );
        // return redirect('dashboard/users')->with('status', 'Usuario creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::pluck('id', 'name');
        return view('users.show', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::pluck('id', 'name');
        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->validated()
            /* [
            'name' => $request['name'],
            'surname' => $request['surname'],
            'role_id' => 2,
            'comercial' => $request['comercial'],
            'estado' => $request['estado'],
            'email' => $request['email'],
            'dni' => $request['dni'],
            'telefono' => $request['telefono'],
            'fecha_nacimiento' => $request['fecha_nacimiento'],
            'updated_at' => Carbon::now(),
            'password' => Hash::make($request['password']),
        ] */);
        return redirect('dashboard/users')->with('status', 'Usuario actualizado con éxito.');
    }

    /* public function updatePass(UpdateUserPassRequest $request, User $user)
    {
        $user->update([
            'password' => Hash::make($request['password']),
        ]);

        return redirect('dashboard/users')->with('status', 'Contraseña actualizada con éxito.');
    }
 */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('status', 'Post eliminado con éxito.');
    }
}
