@extends('template')

@section('tituloNavegador', 'Crear Usuario')

@section('contenido')
    <div class="container py-5">
        <div class="card shadow-sm p-4 border-0 rounded-3">
            <h2 class="mb-4 text-center">Crear Usuario</h2>
            {{-- MENSAJES DE AVISO --}}
            @if ($errors->has('nombre'))
                <div class="alert alert-success">{{ $errors->first('nombre') }}</div>
            @endif
            {{-- FORMULARIO ALTA USUARIO --}}
            <form method="POST" action="{{ route('usuarios.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Ingrese su nombre" required>
                </div>

                <div class="mb-3">
                    <label for="apellidos" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" name="apellidos" placeholder="Ingrese sus apellidos"
                        required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="Ingrese su email" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña"
                        required>
                </div>
                {{-- CENTROS --}}
                <div class="mb-3">
                    <label class="form-label">Seleccione Centro a asociar</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($centros as $centro)
                            <input type="radio" class="btn-check" id="centro_{{ $centro->id }}" name="centro_id"
                                value="{{ $centro->id }}">
                            <label class="btn btn-outline-secondary"
                                for="centro_{{ $centro->id }}">{{ $centro->nombre }}</label>
                        @endforeach
                    </div>
                </div>
                {{-- ROLES --}}
                <div class="mb-3">
                    <label class="form-label">Roles (Mínimo 1)</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach (['Admin', 'Centro', 'Tutor'] as $rol)
                            <input type="checkbox" class="btn-check" id="rol_{{ $rol }}" name="roles[]" value="{{ $rol }}">
                            <label class="btn btn-outline-secondary" for="rol_{{ $rol }}">{{ $rol }}</label>
                        @endforeach
                    </div>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-secondary btn-lg"><i class="bi bi-person-plus"></i> Crear
                        usuario</button>
                </div>
            </form>
        </div>
    </div>
@endsection
