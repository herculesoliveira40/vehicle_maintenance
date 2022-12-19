<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MarcaController;
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