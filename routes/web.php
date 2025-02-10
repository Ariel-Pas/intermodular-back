<?php

use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\CentrosController;
use App\Http\Controllers\FormularioController;
use App\Http\Controllers\LoginController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ServicioController;

use App\Http\Controllers\TokenController;
use App\Http\Controllers\ReseniaController;

use Illuminate\Support\Facades\Route;



//LOGIN
// Route::get('/', function(){
//     return view('auth.login');
// })
// ->name('inicio');

Route::get('/', function(){
    return view('auth.login');
});

// Route::get('/login', function(){
//     return view('auth.login');
// })->name('login');

Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/admin', [UserController::class, 'controlPanel'])
    ->middleware(['auth', 'RolCheck:Admin'])
    ->name('admin');


Route::get('empresas/nuevo', [EmpresaController::class, 'nuevoPrueba'])->middleware('Bloquear');
Route::get('empresas/cambiar/{id}', [EmpresaController::class, 'editarPrueba'])->middleware('Bloquear');

Route::resource('empresas', EmpresaController::class);
Route::resource('centros', CentrosController::class);

//USUARIOS
Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/edit/{id}', [UserController::class, 'edit'])->name('usuarios.edit');
Route::get('/usuarios/{id}', [UserController::class, 'show'])->name('usuarios.show');
Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('usuarios.update');
Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('usuarios.destroy');
//Route::resource('usuarios', UserController::class)->only(['create', 'edit','update', 'index', 'show', 'destroy', 'store']);

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
Route::get('/mostrarFormularios/{id}', [FormularioController::class, 'mostrarFormulario']); // este no funciona en ThunderClient

// Resenias
// Route::get('/resenias/index', [ReseniaController::class, 'index'])->name('resenias.index');
Route::get('/resenias/{tipo?}', [ReseniaController::class, 'index'])->name('resenias.index');
Route::get('/resenias/empresa/{empresaId}', [ReseniaController::class, 'show'])->name('resenias.show');

// Route::post('/resenias', [ReseniaController::class, 'store']);


