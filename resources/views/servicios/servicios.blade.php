@extends('template')

@section('tituloNavegador', 'Servicios')

@section('contenido')
    <div class="container">
        <h2 class="my-4">Gestión de Servicios</h2>

        {{-- MENSAJES DE AVISO --}}
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        {{-- AGREGAR NUEVO SERVICIO --}}
        <div class="card p-3 mb-4 shadow-sm">
            <form method="POST" action="{{ route('servicios.store') }}" class="d-flex gap-2">
                @csrf
                <input type="text" name="nombre" class="form-control" placeholder="Nuevo Servicio" required>
                <button type="submit" class="btn">
                    <i class="bi bi-plus-circle"></i>
                </button>
            </form>
        </div>

        {{-- TABLA DE SERVICIOS --}}
        <div class="table-responsive">
            <table class="table table-hover text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre (Editable)</th>
                        <th>Categoría</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($servicios as $servicio)
                        <tr>
                            {{-- ID SERVICIO --}}
                            <td>{{ $servicio->id }}</td>

                            {{-- NOMBRE SERVICIO (EDITABLE) --}}
                            <td>
                                <form class="d-flex " method="POST" action="{{ route('servicios.update', $servicio->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="nombre" class="form-control form-control-sm"
                                           value="{{ old('nombre', $servicio->nombre) }}" required>
                                           <button type="submit" class="btn"><i class="bi bi-floppy"></i></button>
                                </form>

                            </td>

                            {{-- CATEGORÍAS DEL SERVICIO --}}
                            <td>
                                @if ($servicio->categorias->isNotEmpty())
                                    <ul class="list-unstyled mb-0">
                                        @foreach ($servicio->categorias as $categoria)
                                            <li>{{ $categoria->id }} - {{ $categoria->nombre }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    <span class="text-muted">Sin categoría</span>
                                @endif
                            </td>

                            {{-- BOTONES DE ACCIONES --}}
                            <td class="d-flex justify-content-center gap-2">
                                {{-- BOTÓN GUARDAR --}}
                                {{-- <button type="submit" class="btn">
                                    <i class="bi bi-floppy"></i>
                                </button> --}}
                                {{-- BOTÓN ELIMINAR --}}
                                <form method="POST" action="{{ route('servicios.destroy', $servicio->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
