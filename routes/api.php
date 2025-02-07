<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EmpresasApiController;
use App\Http\Controllers\Api\ReseniaControllerApi;

use App\Http\Controllers\Api\CentroApiController;
use App\Http\Controllers\CicloController;

use App\Http\Controllers\LocalizacionApiController;
use App\Http\Controllers\LoginController;
use App\Models\Ciclo;

use App\Http\Controllers\TokenController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\ReseniaController;
use App\Http\Controllers\Api\TokenControllerApi;
use App\Http\Controllers\Api\SolicitudControllerApi;



Route::post('login', [LoginController::class, 'apiLogin'])->name('apiLogin');


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('empresas', EmpresasApiController::class)->middleware('auth:sanctum');

//Obtener infomación completa de empresa
Route::get('empresa-completa/{id}', [EmpresasApiController::class, 'empresaCompleta'])->middleware('auth:sanctum');

//Ruta pública para alumnos
Route::get('empresas-centro/{idCentro}', [EmpresasApiController::class, 'empresasPorCentro']);



//Obtener ruta pública para alumnos
Route::get('empresas-centro-url', [EmpresasApiController::class, 'obtenerEmpresasUrl'])->middleware('auth:sanctum');

//Ruta privada empresas que busca según usuario autenticado
Route::get('empresas-usuario', [EmpresasApiController::class, 'empresasPorAuth'])->middleware('auth:sanctum');

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


//Ciclos y áreas
Route::get('areas', [CicloController::class, 'getAreas']);
Route::get('ciclos', [CicloController::class, 'index'])->middleware('auth:sanctum');
Route::get('ciclos-area/{id}', [CicloController::class, 'ciclosPorArea'])->middleware('auth:sanctum');

Route::post('mail', [EmpresasApiController::class, 'enviarMail'])->middleware('auth:sanctum');

use Flogti\SpanishCities\Models\Community;
// Route::get('testmun', function(){
//     $municipios = Community::find(10)->towns;
//     return response()->json($municipios);
// });


// Formularios
Route::get('/mostrarFormulario/{id}', [FormularioController::class, 'mostrarFormulario']); // funciona perfecto

// Token
Route::post('/generar-token', [TokenControllerApi::class, 'generarToken']); // insertará en la tabla Token una fila
Route::get('/get-Token/{token}', [TokenControllerApi::class, 'obtenerFormularioPorToken']); // devuelve el formulario dependiendo del token, el token mira el formulario_id


// Resenias
Route::post('/resenias', [ReseniaControllerApi::class, 'store']); // funciona perfecto

// Solicitudes
Route::post('/solicitudes', [SolicitudControllerApi::class, 'store']);
Route::post('solicitudes/{solicitudId}/agregar-ciclos', [SolicitudControllerApi::class, 'agregarCiclosASolicitud']); // nuevo



//Centros
Route::get('centros', [CentroApiController::class, 'index']);
Route::get('ciclosPorCentro/{idCentro}', [CentroApiController::class, 'ciclosPorCentro']); // nuevo

Route::get('centros-provincia/{idProvincia}', [CentroApiController::class, 'centrosPorProvincia']);
Route::get('centros-localidad/{idLocalidad}', [CentroApiController::class, 'centrosPorLocalidad']);

