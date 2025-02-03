<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EmpresasApiController;
use App\Http\Controllers\CicloController;
use App\Http\Controllers\Api\ServicioApiController;
use App\Http\Controllers\Api\CategoriaApiController;
use App\Http\Controllers\LocalizacionApiController;
use App\Http\Controllers\LoginController;
use App\Models\Ciclo;


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
Route::get('areas', [CicloController::class, 'getAreas']);
//Ciclos y áreas
Route::get('ciclos', [CicloController::class, 'index'])->middleware('auth:sanctum');
Route::get('ciclos-area/{id}', [CicloController::class, 'ciclosPorArea'])->middleware('auth:sanctum');

Route::post('mail', [EmpresasApiController::class, 'enviarMail'])->middleware('auth:sanctum');



//use Flogti\SpanishCities\Models\Community;
// Route::get('testmun', function(){
//     $municipios = Community::find(10)->towns;
//     return response()->json($municipios);
// });


//SERVICIOS
// Route::get('/servicios', [ServicioApiController::class, 'index']);
// Route::get('/servicios/{id}', [ServicioApiController::class, 'show']);
// Route::post('/servicios', [ServicioApiController::class, 'store']);
// Route::put('/servicios/{id}', [ServicioApiController::class, 'update']);
// Route::delete('/servicios/{id}', [ServicioApiController::class, 'destroy']);

Route::apiResource('servicios', ServicioApiController::class);

//CATEGORIAS
// Route::get('/categorias', [CategoriaApiController::class, 'index']);
// Route::get('/categorias/{id}', [CategoriaApiController::class, 'show']);
// Route::post('/categorias', [CategoriaApiController::class, 'store']);
// Route::put('/categorias/{id}', [CategoriaApiController::class, 'update']);
// Route::delete('/categorias/{id}', [CategoriaApiController::class, 'destroy']);

Route::apiResource('categorias', CategoriaApiController::class);
