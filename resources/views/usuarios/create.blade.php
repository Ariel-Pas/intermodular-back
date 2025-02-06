{{-- @extends('template')

@section('tituloNavegador', 'Crear Usuario')

@section('contenido')
    <div class="container">
        <h2 class="my-4">Crear Usuario</h2>
        <form method="POST" action="{{route('usuarios.store')}}">
            @csrf
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" value="" placeholder="">
            </div>
            <div>
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos" value="" placeholder="">
            </div>
            <div>
                <label for="email">E-mail</label>
                <input type="email" name="email" value="" placeholder="">
            </div>
            <div>
                <label for="password">Contraseña</label>
                <input type="password" name="password" placeholder="">
            </div>
            <label for="centro_id">ID del Centro (*)</label>
            @foreach ($centros as $centro)
                <div class="d-flex"> --}}
                    {{-- <label for="">
                        <input type="checkbox" name="{{$centro->nombre}}" id="centro_{{$centro->id}}" value="{{$centro->id}}">
                        {{$centro->nombre}}
                    </label> --}}
                    {{-- <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                        <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" value="{{$centro->id}}">
                        <label class="btn btn-outline-primary" for="btncheck1">{{$centro->nombre}}</label>
                    </div>
                </div>
            @endforeach
            <button class="btn"><i class="bi bi-person-plus"></i> Crear usuario</button>
        </form>

    </div>
@endsection --}}


@extends('template')

@section('tituloNavegador', 'Crear Usuario')

@section('contenido')
<div class="container py-5">
    <div class="card shadow-sm p-4 border-0 rounded-3">
        <h2 class="mb-4 text-center">Crear Usuario</h2>
        <form method="POST" action="{{route('usuarios.store')}}">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre" required>
            </div>

            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos</label>
                <input type="text" class="form-control" name="apellidos" placeholder="Ingrese sus apellidos" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" name="email" placeholder="Ingrese su email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Seleccione Centro a asociar</label>
                <div class="d-flex flex-wrap gap-2">
                    @foreach ($centros as $centro)
                        <input type="radio" class="btn-check" id="centro_{{$centro->id}}" name="centro_id" value="{{$centro->id}}">
                        <label class="btn btn-outline-secondary"  for="centro_{{$centro->id}}">{{$centro->nombre}}</label>
                    @endforeach
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-secondary btn-lg"><i class="bi bi-person-plus"></i> Crear usuario</button>
            </div>
        </form>
    </div>
</div>
@endsection
