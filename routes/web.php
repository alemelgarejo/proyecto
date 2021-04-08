<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\MiclienteController;
use App\Http\Controllers\MiordeneController;
use App\Http\Controllers\MipropiedadeController;
use App\Http\Controllers\MipropietarioController;
use App\Http\Controllers\OrdeneController;
use App\Http\Controllers\PropiedadeController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebController;
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
    return redirect('/home');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('dashboard/users', UserController::class)->middleware('checkRole');
Route::post('dashboard/users/{user}', [UserController::class, 'updatePass'])->name('users.updatePass')->middleware('checkRole');
Route::resource('dashboard/clientes', ClienteController::class)->middleware('checkRole');
Route::resource('dashboard/propietarios', PropietarioController::class)->middleware('checkRole');
Route::resource('dashboard/propiedades', PropiedadeController::class)->middleware('checkRole');
Route::resource('dashboard/misclientes', MiclienteController::class)->middleware('checkRole1');
Route::resource('dashboard/ordenes', OrdeneController::class)->middleware('checkRole1');
Route::resource('dashboard/mispropietarios', MipropietarioController::class)->middleware('checkRole1');
Route::resource('dashboard/mispropiedades', MipropiedadeController::class)->middleware('checkRole1');
//Route::resource('dashboard/files',FileController::class)->middleware('checkRole1');
Route::get('dashboard/files/{propiedade}',[FileController::class, 'index2'])->name('files.index2')->middleware('checkRole1');
Route::get('dashboard/files/create/{propiedade}',[FileController::class, 'create2'])->name('files.create2')->middleware('checkRole1');
Route::post('dashboard/files/{propiedade}',[FileController::class, 'store2'])->name('files.store2')->middleware('checkRole1');
Route::delete('dashboard/files/{file}',[FileController::class, 'destroy'])->name('files.destroy')->middleware('checkRole1');

Route::get('home', [WebController::class, 'index'])->name('vista.index');
Route::post('home', [WebController::class, 'storeMessage'])->name('vista.storeMessage')->middleware('checkRoleTotal');
Route::get('home/propiedades', [WebController::class, 'propiedades'])->name('vista.propiedades');
Route::get('home/agentes', [WebController::class, 'agentes'])->name('vista.agentes');
Route::get('home/register', [WebController::class, 'register'])->name('vista.register');
Route::get('home/login', [WebController::class, 'login'])->name('vista.login');
Route::get('home/contacto', function(){
    return view('vista-cliente.contact');
})->name('vista.contacto');

Route::resource('dashboard/events', EventController::class)->middleware('checkRole1');
