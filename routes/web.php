<?php

use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\CentrosController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ServicioController;

use App\Http\Controllers\TokenController;
use App\Http\Controllers\ReseniaController;
use App\Http\Controllers\SolicitudController;

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


//CATEGORIAS
Route::get('/categorias', [CategoriaController::class, 'index'])->name('categorias.index');
Route::post('/categorias', [CategoriaController::class, 'store'])->name('categorias.store');
Route::put('/categorias/{id}', [CategoriaController::class, 'update'])->name('categorias.update');
Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy'])->name('categorias.destroy');

//SERVICIOS
Route::get('/servicios', [ServicioController::class, 'index'])->name('servicios.index');
Route::post('/servicios', [ServicioController::class, 'store'])->name('servicios.store');
Route::put('/servicios/{id}', [ServicioController::class, 'update'])->name('servicios.update');
Route::delete('/servicios/{id}', [ServicioController::class, 'destroy'])->name('servicios.destroy');

// Formularios
Route::get('/mostrarFormularios/{id}', [FormularioController::class, 'mostrarFormulario']); 

// Resenias
Route::get('/resenias/{tipo?}', [ReseniaController::class, 'index'])->name('resenias.index');
Route::get('/resenias/empresa/{empresaId}', [ReseniaController::class, 'show'])->name('resenias.show');

// Solicitudes
Route::get('/solicitudes/index', [SolicitudController::class, 'index'])->name('solicitudes.index');
Route::get('/solicitudes/show/{id}', [SolicitudController::class, 'show'])->name('solicitudes.show');
Route::delete('/solicitudes/destroy/{id}', [SolicitudController::class, 'destroy'])->name('solicitudes.destroy');
Route::post('/solicitudes/store', [SolicitudController::class, 'store'])->name('solicitudes.store');
Route::get('/solicitudes/create', [SolicitudController::class, 'create'])->name('solicitudes.create');
