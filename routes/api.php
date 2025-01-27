<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EmpresasApiController;
use App\Http\Controllers\LocalizacionApiController;
use App\Http\Controllers\LoginController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('empresas', EmpresasApiController::class);

Route::post('login', [LoginController::class, 'apiLogin'])->name('apiLogin');


//Localizaciones
Route::get('provincias', [LocalizacionApiController::class, 'getProvincias']);
Route::get('municipios/{id}', [LocalizacionApiController::class, 'getMunicipios']);

use Flogti\SpanishCities\Models\Community;
Route::get('testmun', function(){
    $municipios = Community::find(10)->towns;
    return response()->json($municipios);
});
