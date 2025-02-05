@extends('template')

@section('tituloNavegador', 'Categorías')

@section('contenido')
    <div class="container">
        <h2 class="my-4">Gestión de Categorías y Servicios</h2>

        {{-- MENSAJES DE AVISO --}}
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        {{-- AGREGAR NUEVA CATEGORÍA --}}
        <div class="card p-3 mb-4 shadow-sm">
            <form method="POST" action="{{ route('categorias.store') }}">
                @csrf
                <input type="text" name="nombre" class="form-control mb-2" placeholder="Nueva Categoría" required>

                {{-- CHECKBOXES PARA SELECCIONAR SERVICIOS --}}
                <p class="mb-1">Seleccionar Servicios:</p>
                <div class="d-flex flex-wrap gap-2 ">
                    @foreach ($servicios as $servicio)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="servicios[]" value="{{ $servicio->id }}" id="servicio_{{ $servicio->id }}">
                            <label class="form-check-label" for="servicio_{{ $servicio->id }}">
                                {{ $servicio->nombre }}
                            </label>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-end align-items-start">
                    <button type="submit" class="btn mt-2 shadow" style="border:solid 2px; border-color:#278a81">
                        Crear  <i class="bi bi-plus-circle"></i>
                    </button>
                </div>
            </form>
        </div>

        {{-- LISTADO DE CATEGORÍAS --}}
        <h4 class="my-4">Listado de Categorías existentes</h4>

        @foreach ($categorias as $categoria)
            <div class="card mb-3 shadow-sm">
                <div class="card-body d-flex">
                    {{-- FORMULARIO EDITAR CATEGORÍA --}}
                    <form method="POST" action="{{ route('categorias.update', $categoria->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="d-flex justify-content-between align-items-center">
                            <input type="text" name="nombre" class="form-control form-control-sm"
                                   value="{{ old('nombre', $categoria->nombre) }}" required>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn">
                                    <i class="bi bi-floppy"></i>
                                </button>
                                {{-- <form method="POST" action="{{ route('categorias.destroy', $categoria->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form> --}}
                            </div>
                        </div>

                        {{-- CHECKBOXES PARA ASOCIAR SERVICIOS --}}
                        <p class="mt-3 mb-1">Servicios Asociados:</p>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach ($servicios as $servicio)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="servicios[]" value="{{ $servicio->id }}"
                                           id="servicio_edit_{{ $categoria->id }}_{{ $servicio->id }}"
                                           {{ $categoria->servicios->contains($servicio->id) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="servicio_edit_{{ $categoria->id }}_{{ $servicio->id }}">
                                        {{ $servicio->nombre }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </form>
                    <form method="POST" action="{{ route('categorias.destroy', $categoria->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
