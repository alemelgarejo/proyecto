<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('dashboard/users', UserController::class)->middleware('checkRole');
Route::post('dashboard/users/{user}', [UserController::class, 'updatePass'])->name('users.updatePass')->middleware('checkRole');
Route::resource('dashboard/clientes', ClienteController::class);
Route::resource('dashboard/propietarios', PropietarioController::class);
