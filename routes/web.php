<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\CentrosController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TokenController;
use App\Http\Controllers\ReseniaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){

    return view('inicio');
})
->name('inicio');

Route::get('empresas/nuevo', [EmpresaController::class, 'nuevoPrueba'])->middleware('Bloquear');
Route::get('empresas/cambiar/{id}', [EmpresaController::class, 'editarPrueba'])->middleware('Bloquear');

Route::resource('empresas', EmpresaController::class);
Route::resource('centros', CentrosController::class);

//Sesión
Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login' , [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

// Formularios
Route::get('/mostrarFormularios/{id}', [FormularioController::class, 'mostrarFormulario']); // este no funciona en ThunderClient

// Resenias
// Route::post('/resenias', [ReseniaController::class, 'store']);

