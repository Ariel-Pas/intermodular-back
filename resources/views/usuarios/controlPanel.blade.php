@extends('template')

@section('tituloNavegador', 'Panel de Control')

@section('contenido')
    {{-- <div class="row"> --}}
    {{-- <div class="col-3 ms-2 border-end border-2" style="color:#278a81"> --}}
    <div>
        <h3 class="mb-5">Administrar</h3>
    </div>
    <div>
        <a class="text-decoration-none" href="#"><i class="bi bi-people"></i> Usuarios</a>
        <hr>
    </div>
    <div>
        <a class="text-decoration-none" href="#"><i class="bi bi-buildings"></i> Empresas</a>
        <hr>
    </div>
    <div>
        <a class="text-decoration-none" href="#"><i class="bi bi-bank"></i> Centros</a>
        <hr>
    </div>
    <div>
        <a class="text-decoration-none" href="#"><i class="bi bi-mortarboard"></i> Ciclos</a>
        <hr>
    </div>
    <div>
        <a class="text-decoration-none" href="#"><i class="bi bi-tags"></i> Categorias</a>
        <hr>
    </div>
    <div>
        <a class="text-decoration-none" href="#"><i class="bi bi-briefcase"></i> Servicios</a>
        <hr>
    </div>
    <div>
        <a class="text-decoration-none" href="#"><i class="bi bi-envelope-paper"></i> Solicitudes</a>
        <hr>
    </div>
    <div>
        <a class="text-decoration-none" href="#"><i class="bi bi-list-stars"></i> Reseñas/Formularios</a>
        <hr>
    </div>
    {{-- </div> --}}
    {{-- <div class="col-8"> --}}

    {{-- </div> --}}
    {{-- </div> --}}

@endsection

@section('contenidoDinamico')
    <h2>contenido Dinamico</h2>
@endsection
