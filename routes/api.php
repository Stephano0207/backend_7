<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource("categorias",CategoriaController::class);
Route::resource("productos",ProductoController::class);
Route::resource("clientes",ClienteController::class);
Route::resource("usuarios",UsuarioController::class);
Route::post('iniciarSesion',[UsuarioController::class,'login']);
Route::get("filtradoCliente",[ClienteController::class,"filtro"]);
Route::get("filtradoProducto",[ProductoController::class,"filtro"]);
Route::get("filtradoCategoria",[CategoriaController::class,"filtro"]);
