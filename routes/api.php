<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\EmpresasApiController;
use App\Http\Controllers\LoginController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('empresas', EmpresasApiController::class);

Route::post('login', [LoginController::class, 'apiLogin'])->name('apiLogin');

