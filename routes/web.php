<?php

use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){

    return view('inicio');
})
->name('inicio');

Route::get('empresas/nuevo', [EmpresaController::class, 'nuevoPrueba']);
Route::get('empresas/cambiar/{id}', [EmpresaController::class, 'editarPrueba']);

Route::resource('empresas', EmpresaController::class);




