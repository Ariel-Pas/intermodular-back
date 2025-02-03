<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\CentrosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


//CONTROLAR SI YA ESTAS LOGEADO Y ACCEDES A '/' QUE REDIRIJA A ?
Route::get('/', function(){
    return view('auth.login');
})
->name('inicio');

//VER, NO SE SI FUNCIONA
Route::get('/admin', function () {
    return view('inicio');
})->middleware('auth');



Route::get('empresas/nuevo', [EmpresaController::class, 'nuevoPrueba'])->middleware('Bloquear');
Route::get('empresas/cambiar/{id}', [EmpresaController::class, 'editarPrueba'])->middleware('Bloquear');

Route::resource('empresas', EmpresaController::class);
Route::resource('centros', CentrosController::class);

//Sesión
Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login' , [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

//ANGULAR
Route::post('login', [LoginController::class, 'apiLogin'])->name('apilogin');


Route::get('admin', [UserController::class, 'controlPanel'])->middleware('RolCheck:Admin')->name('controlPanel');
Route::get('users', [UserController::class, 'index'])->name('listaUsuarios');

