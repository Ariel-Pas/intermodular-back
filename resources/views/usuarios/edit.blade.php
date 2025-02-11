@extends('template')

@section('tituloNavegador', 'Editar Usuario')

@section('contenido')
    <div class="container py-5">
        <div class="card shadow-sm p-4 border-0 rounded-3">
            <h2 class="my-4">Editar Usuario <i class="bi bi-person-gear "></i> <i class="bi bi-arrow-right"></i> [<strong>Nombre: </strong>{{$usuario->nombre}}]  [<strong>ID: </strong> {{$usuario->id}}]</h2>
            {{-- MENSAJES DE AVISO --}}
            @if ($errors->has('nombre'))
                <div class="alert alert-success">{{ $errors->first('nombre') }}</div>
            @endif
            {{-- FORMULARIO ALTA USUARIO --}}
            <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre" value="{{$usuario->nombre}}" required>
                </div>

                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Ingrese sus apellidos" value="{{$usuario->apellidos}}" required >
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingrese su email" value="{{$usuario->email}}" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Nueva contraseña (Opcional)</label>
                    <input type="password" class="form-control" name="password" placeholder="Ingrese su nueva contraseña">
                </div>

                {{-- CENTROS --}}
                <div class="mb-3">
                    <label class="form-label">Seleccione Centro Asociado</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($centros as $centro)
                            <input type="radio" class="btn-check" id="centro_{{ $centro->id }}" name="centro_id"
                                value="{{ $centro->id }}"
                                {{ $usuario->centro_id == $centro->id ? 'checked' : '' }}>
                            <label class="btn btn-outline-secondary" for="centro_{{ $centro->id }}">{{ $centro->nombre }}</label>
                        @endforeach
                    </div>
                </div>

                {{-- ROLES --}}
                <div class="mb-3">
                    <label class="form-label">Roles (Mínimo 1)</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach (['Admin', 'Centro', 'Tutor'] as $rol)
                            <input type="checkbox" class="btn-check" id="rol_{{ $rol }}" name="roles[]"
                                value="{{ $rol }}"
                                {{ $usuario->roles->contains('nombre', $rol) ? 'checked' : '' }}>
                            <label class="btn btn-outline-secondary" for="rol_{{ $rol }}">{{ $rol }}</label>
                        @endforeach
                    </div>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-secondary btn-lg"><i class="bi bi-person-up"></i> Editar
                        usuario</button>
                </div>
            </form>
              {{-- BOTÓN PARA VOLVER --}}
              <div class="text-center mt-4">
                <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>
            </div>
        </div>
    </div>
@endsection
