<?php

use App\Http\Controllers\EmpresaController;
use Illuminate\Support\Facades\Route;


Route::get('/', function(){

    return view('inicio');
})
->name('inicio');

Route::resource('empresas', EmpresaController::class);

Route::get('nuevo', [EmpresaController::class, 'nuevoPrueba']);

Route::get('cambiar/{id}', [EmpresaController::class, 'editarPrueba']);
