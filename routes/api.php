<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EmpresasApiController;
use App\Http\Controllers\LocalizacionApiController;
use App\Http\Controllers\LoginController;


Route::post('login', [LoginController::class, 'apiLogin'])->name('apiLogin');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('empresas', EmpresasApiController::class)->middleware('auth:sanctum');

//Obtener infomación completa de empresa
Route::get('empresa-completa/{id}', [EmpresasApiController::class, 'empresaCompleta'])->middleware('auth:sanctum');

//Ruta pública para alumnos
Route::get('empresas-centro/{idCentro}', [EmpresasApiController::class, 'empresasPorCentro']);



//Editar por token
//obtener url editar de una empresa
Route::get('empresas/buscar-token/{id}', [EmpresasApiController::class, 'obtenerUrlEditarPorIdEmpresa'])->middleware('auth:sanctum');
//Buscar empresa por token
Route::get('empresas/token/{token}', [EmpresasApiController::class, 'empresaPorToken']);
//Editar
Route::post('empresas/token/{token}', [EmpresasApiController::class, 'updateEmpresaPorToken']);


//Asociar empresa a centro
//Comprobar si existe por cif
Route::get('empresas/comprobar-cif/{cif}', [EmpresasApiController::class, 'obtenerEmpresaPorCif'])->middleware('auth:sanctum');
Route::get('empresas/asociar-centro/{id}', [EmpresasApiController::class, 'asociarEmpresaCentro'])->middleware('auth:sanctum');

//Actualizar notas de empresa
Route::post('empresas/notas/{idEmpresa}', [EmpresasApiController::class, 'actualizarNota'])->middleware('auth:sanctum');

//Localizaciones
Route::get('provincias', [LocalizacionApiController::class, 'getProvincias']);
Route::get('municipios/{id}', [LocalizacionApiController::class, 'getMunicipios']);



Route::post('mail', [EmpresasApiController::class, 'enviarMail'])->middleware('auth:sanctum');


