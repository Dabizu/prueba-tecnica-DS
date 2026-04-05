<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsuarioController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

//desde aqui iniciamos la actualizacion
Route::post('/login', [UsuarioController::class, 'login']);
Route::post('/registrarUsuario', [UsuarioController::class, 'registrarUsuario']);
Route::get('/prueba', [UsuarioController::class,'prueba']);
Route::delete('/eliminarUsuario', [UsuarioController::class, 'eliminar']);
Route::get('/listarUsuario', [UsuarioController::class,'listar']);
Route::post('/modificarUsuario', [UsuarioController::class,'modificar']);