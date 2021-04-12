<?php

use App\Http\Controllers\api\ClienteController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\PropietarioController;
use App\Http\Controllers\api\PropiedadeController;
use App\Http\Controllers\api\OrdeneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); */
//header('Access-Control-Allow-Origin: *');
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('users', UserController::class);
Route::apiResource('propietarios', PropietarioController::class);
Route::apiResource('ordenes', OrdeneController::class);
Route::apiResource('propiedades', PropiedadeController::class);