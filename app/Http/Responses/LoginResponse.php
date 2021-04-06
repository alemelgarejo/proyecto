<?php
namespace App\Http\Responses;
use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;
class LoginResponse implements ContractsLoginResponse
{
    public function toResponse($request)
    {
        // here i am checking if the currently logout in users has a role_id of 2 which make him a regular user and then redirect to the users dashboard else the admin dashboard
        if (auth()->user()->role_id == 2 or auth()->user()->role_id == 1) {
            return redirect(route('dashboard'))->with('status', auth()->user()->name.' '.auth()->user()->surname.' ha iniciado sesión con éxito.');
        } elseif (auth()->user()->role_id == 3) {
            return redirect(route('vista.index'))->with('status', auth()->user()->name.' '.auth()->user()->surname.' ha iniciado sesión con éxito.');
        }
    }
}
