<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EmpresasApiController;
use App\Http\Controllers\LocalizacionApiController;
use App\Http\Controllers\LoginController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('empresas', EmpresasApiController::class)->middleware('auth:sanctum');

//Ruta pública para alumnos
Route::get('empresas-centro/{idCentro}', [EmpresasApiController::class, 'empresasPorCentro']);
Route::post('login', [LoginController::class, 'apiLogin'])->name('apiLogin');


//Localizaciones
Route::get('provincias', [LocalizacionApiController::class, 'getProvincias']);
Route::get('municipios/{id}', [LocalizacionApiController::class, 'getMunicipios']);


