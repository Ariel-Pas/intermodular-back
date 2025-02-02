@extends('template')

@section('tituloNavegador', 'Panel de Control')

@section('contenido')
    <div class="row">
        <div class="col-3 ms-2 border-end border-2" style="color:#278a81">
            <div>
                <h3 class="mb-5">Administrar</h3>
            </div>
            <div>
                <p><i class="bi bi-people"></i> Usuarios</p>
                <hr>
            </div>
            <div>
                <p><i class="bi bi-buildings"></i> Empresas</p>
                <hr>
            </div>
            <div>
                <p><i class="bi bi-bank"></i> Centros</p>
                <hr>
            </div>
            <div>
                <p><i class="bi bi-mortarboard"></i> Ciclos</p>
                <hr>
            </div>
            <div>
                <p><i class="bi bi-tags"></i> Categorias</p>
                <hr>
            </div>
            <div>
                <p><i class="bi bi-briefcase"></i> Servicios</p>
                <hr>
            </div>
            <div>
                <p><i class="bi bi-envelope-paper"></i> Solicitudes</p>
                <hr>
            </div>
        </div>
        <div class="col-8">
            <h1>CONTENIDO</h1>
        </div>
    </div>

@endsection
