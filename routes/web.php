<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\VersaoController;

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
    return view('/layouts/main');
});


//Rotas Marca
Route::get('/marcas', [MarcaController::class, 'dashboard']);
Route::get('/marcas/dashboard', [MarcaController::class, 'dashboard']);
Route::get('/marcas/create', [MarcaController::class, 'create']);
Route::post('/marcas', [MarcaController::class, 'store']);
Route::get('/marcas/edit/{id}', [MarcaController::class, 'edit']);
Route::put('/marcas/update/{id}', [MarcaController::class, 'update']);
Route::delete('/marcas/{id}', [MarcaController::class, 'destroy']);

//Rotas Modelo
Route::get('/modelos', [ModeloController::class, 'dashboard']);
Route::get('/modelos/dashboard', [ModeloController::class, 'dashboard']);
Route::get('/modelos/create', [ModeloController::class, 'create']);
Route::post('/modelos', [ModeloController::class, 'store']);
Route::get('/modelos/edit/{id}', [ModeloController::class, 'edit']);
Route::put('/modelos/update/{id}', [ModeloController::class, 'update']);
Route::delete('/modelos/{id}', [ModeloController::class, 'destroy']);

//Rotas Modelo
Route::get('/versoes', [VersaoController::class, 'dashboard']);
Route::get('/versoes/dashboard', [VersaoController::class, 'dashboard']);
Route::get('/versoes/create', [VersaoController::class, 'create']);
Route::post('/versoes', [VersaoController::class, 'store']);
Route::get('/versoes/edit/{id}', [VersaoController::class, 'edit']);
Route::put('/versoes/update/{id}', [VersaoController::class, 'update']);
Route::delete('/versoes/{id}', [VersaoController::class, 'destroy']);