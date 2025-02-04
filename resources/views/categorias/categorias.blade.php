@extends('template')

@section('tituloNavegador', 'Categorias')

@section('contenido')
    <div class="container">
        <h2>Gestión de Categorías y Servicios</h2>

        {{-- MOSTRAR MENSAJES --}}
        {{-- REVISAR --}}
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        {{-- AGREGAR NUEVA CATEGORIA --}}
        <form method="POST" action="{{ route('categorias.store') }}" class="mb-4">
            @csrf
            <input type="text" name="nombre" class="form-control" placeholder="Nueva Categoría" required>
            <button type="submit" class="btn btn-primary mt-2"><i class="bi bi-plus-circle"></i> Agregar Categoría</button>
        </form>

        {{-- LISTADO DE CATEGORIAS --}}
        @foreach ($categorias as $categoria)
            <div class="card mt-3">
                <div class="card-body">
                    {{-- EEDITAR CATEGORIA --}}
                    <form method="POST" action="{{ route('categorias.update', $categoria->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="d-flex align-items-center">
                            <input type="text" name="nombre" class="form-control"
                                value="{{ old('nombre', $categoria->nombre) }}" required>
                            <button type="submit" class="btn btn-success mx-2"><i class="bi bi-floppy"></i> Editar</button>
                        </div>
                    </form>
                    {{-- ELIMINAR CATEGORIA --}}
                    <form method="POST" action="{{ route('categorias.destroy', $categoria->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</button>
                    </form>

                    {{-- AGREGAR SERVICIO --}}
                    <form method="POST" action="{{ route('servicios.store', $categoria->id) }}" class="mt-3">
                        @csrf
                        <input type="text" name="nombre" class="form-control" placeholder="Nuevo Servicio" required>
                        <button type="submit" class="btn btn-secondary mt-2"><i class="bi bi-plus-circle"></i> Agregar Servicio</button>
                    </form>

                    {{-- LISTADO SERVICIOS --}}
                    @foreach ($categoria->servicios as $servicio)
                        <div class="d-flex mt-2">
                            {{-- EDITAR SERVICIO --}}
                            <form method="POST" action="{{ route('servicios.update', $servicio->id) }}">
                                @csrf
                                <input type="text" name="nombre" class="form-control"
                                    value="{{ old('nombre', $servicio->nombre) }}" required>
                                <button type="submit" class="btn btn-success mx-2"><i class="bi bi-floppy"></i> Editar</button>
                            </form>
                            
                            {{-- ELIMINAR SERVICIO --}}
                            <form method="POST" action="{{ route('servicios.destroy', $servicio->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Eliminar</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
