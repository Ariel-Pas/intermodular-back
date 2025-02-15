@extends('template')

@section('tituloNavegador', 'Empresas')

@section('contenido')
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="my-4 ">Gestión de Empresas</h2>
            <a class="btn btn-sm btn-outline-secondary me-2" href="{{ route('pdf-empresas') }}">
                <i class="bi bi-filetype-pdf"></i> Descargar en pdf
            </a>
        </div>

        {{-- MENSAJES DE AVISO --}}
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        {{-- AGREGAR NUEVA EMPRESA --}}
        <div class="card p-3 mb-4 shadow-sm">
            <a class="btn" href="{{ route('empresas.create') }}">
                <i class="bi bi-plus-circle"></i> Añadir Empresa
            </a>
        </div>

        {{-- LISTADO DE EMPRESAS --}}
        <h4 class="my-4">Listado de Empresas</h4>

        <div class="row">
            @forelse($empresas as $empresa)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $empresa->nombre }}</h5>
                            <p class="card-text">{{ $empresa->descripcion }}</p>
                            <div class="d-flex justify-content-end">

                                <a class="btn btn-sm btn-outline-secondary me-2" href="{{ route('empresas.edit', $empresa->id) }}">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>

                                <form action="{{ route('empresas.destroy', $empresa->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        <i class="bi bi-trash"></i> Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-muted">No hay resultados</p>
            @endforelse
        </div>

        {{-- PAGINACIÓN --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $empresas->links() }}
        </div>
    </div>
@endsection
