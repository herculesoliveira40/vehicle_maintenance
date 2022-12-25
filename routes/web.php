<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\VersaoController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\ManutencaoController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::get('/register', [UserController::class, 'create']);
Route::post('/users', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login/auth', [UserController::class, 'auth'])->name('usuario.auth');
Route::post('/logout', [UserController::class, 'logout'])->name('logout'); // Alias Route

//middleware AdminAccess
Route::middleware(['admin'])->group(function () { 

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

    //Rotas Versao
    Route::get('/versoes', [VersaoController::class, 'dashboard']);
    Route::get('/versoes/dashboard', [VersaoController::class, 'dashboard']);
    Route::get('/versoes/create', [VersaoController::class, 'create']);
    Route::post('/versoes', [VersaoController::class, 'store']);
    Route::get('/versoes/edit/{id}', [VersaoController::class, 'edit']);
    Route::put('/versoes/update/{id}', [VersaoController::class, 'update']);
    Route::delete('/versoes/{id}', [VersaoController::class, 'destroy']);

    // Rotas User
    Route::get('/u', [UserController::class, 'create']);
    Route::get('/users/create', [UserController::class, 'create']);
   // Route::post('/users', [UserController::class, 'store']); Acima tem
    Route::get('/users/dashboard', [UserController::class, 'dashboard']);
    Route::get('/users/edit/{id}', [UserController::class, 'edit']);
    Route::put('/users/update/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
    Route::get('/ual', fn () => User::all()); // Arrow function return all
});


Route::middleware(['auth'])->group(function () {
    //Rotas Veiculo
    Route::get('/veiculos', [VeiculoController::class, 'dashboard']);
    Route::get('/veiculos/dashboard', [VeiculoController::class, 'dashboard']);
    Route::get('/veiculos/create', [VeiculoController::class, 'create']);
    Route::post('/veiculos', [VeiculoController::class, 'store']);
    Route::get('/veiculos/edit/{id}', [VeiculoController::class, 'edit']);
    Route::get('/veiculos/{id}', [VeiculoController::class, 'show']);
    Route::put('/veiculos/update/{id}', [VeiculoController::class, 'update']);
    Route::delete('/veiculos/{id}', [VeiculoController::class, 'destroy']);

    //Rotas Manutencao
    Route::get('/manutencoes', [ManutencaoController::class, 'dashboard']);
    Route::get('/manutencoes/home', [ManutencaoController::class, 'home']);
    Route::get('/manutencoes/dashboard', [ManutencaoController::class, 'dashboard']);
    Route::get('/manutencoes/create', [ManutencaoController::class, 'create']);
    Route::post('/manutencoes', [ManutencaoController::class, 'store']);
    Route::get('/manutencoes/edit/{id}', [ManutencaoController::class, 'edit']);
    Route::put('/manutencoes/update/{id}', [ManutencaoController::class, 'update']);
    Route::delete('/manutencoes/{id}', [ManutencaoController::class, 'destroy']);

    
});

