<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\CentrosController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){

    return view('inicio');
})
->name('inicio');

Route::get('empresas/nuevo', [EmpresaController::class, 'nuevoPrueba'])->middleware('Bloquear');
Route::get('empresas/cambiar/{id}', [EmpresaController::class, 'editarPrueba'])->middleware('Bloquear');

Route::resource('empresas', EmpresaController::class);
Route::resource('centros', CentrosController::class);




