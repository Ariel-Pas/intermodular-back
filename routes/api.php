<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EmpresasApiController;
use App\Http\Controllers\Api\ReseniaControllerApi;
use App\Http\Controllers\LocalizacionApiController;
use App\Http\Controllers\LoginController;


use App\Http\Controllers\TokenController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\ReseniaController;
use App\Http\Controllers\Api\TokenControllerApi;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('empresas', EmpresasApiController::class);

Route::post('login', [LoginController::class, 'apiLogin'])->name('apiLogin');


//Localizaciones
Route::get('provincias', [LocalizacionApiController::class, 'getProvincias']);
Route::get('municipios/{id}', [LocalizacionApiController::class, 'getMunicipios']);

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



