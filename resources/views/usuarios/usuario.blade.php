@extends('template')

@section('tituloNavegador', 'Detalles del Usuario')

@section('contenido')
    <div class="container py-5">
        <div class="card shadow-sm p-4 border-0 rounded-3">
            <h2 class="mb-4 text-center">Detalles del Usuario <i class="bi bi-person-vcard"></i></h2>

            {{-- INFORMACIÓN DEL USUARIO --}}
            <div class="row mb-3">
                <div class="col-md-6">
                    <p><strong>Nombre:</strong> {{ $usuario->nombre }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Apellidos:</strong> {{ $usuario->apellidos }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Email:</strong> {{ $usuario->email }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>ID de Usuario:</strong> {{ $usuario->id }}</p>
                </div>
            </div>

            {{-- CENTRO ASOCIADO --}}
            <div class="mb-3">
                <p><strong>Centro Asociado:</strong>
                    @if($usuario->centro)
                        <span class="badge bg-primary">{{ $usuario->centro->nombre }}</span>
                    @else
                        <span class="badge bg-secondary">No asignado</span>
                    @endif
                </p>
            </div>

            {{-- ROLES --}}
            <div class="mb-3">
                <p><strong>Roles:</strong>
                    @if($usuario->roles->isNotEmpty())
                        @foreach($usuario->roles as $rol)
                            <span class="badge bg-success">{{ $rol->nombre }}</span>
                        @endforeach
                    @else
                        <span class="badge bg-secondary">Sin roles asignados</span>
                    @endif
                </p>
            </div>

            {{-- BOTÓN PARA VOLVER --}}
            <div class="text-center mt-4">
                <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left"></i> Volver a la lista
                </a>
            </div>
        </div>
    </div>
@endsection
