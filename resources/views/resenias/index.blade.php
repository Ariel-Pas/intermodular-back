
@extends('template')

@section('tituloNavegador', 'Reseñas')

@section('contenido')

<div class="container">
    <h2 class="text-center font-bold text-2xl mb-4">Reseñas</h2>

    <div class="flex justify-center gap-4 mb-4">
        <button class="btn btn-primary"> <a href="{{ route('resenias.index', ['tipo' => 1]) }}" class="bg-blue-500 text-white px-4 py-2 rounded" style="text-decoration: none">Reseñas a practicantes</a> </button>
        <button class="btn btn-primary"> <a href="{{ route('resenias.index', ['tipo' => 2]) }}" class="bg-green-500 text-white px-4 py-2 rounded" style="text-decoration: none">Reseñas a empresas</a> </button>
        <button class="btn btn-primary"> <a href="{{ route('resenias.index') }}" class="bg-gray-500 px-4 py-2 text-white rounded" style="text-decoration: none">Mostrar Todos</a> </button>
    </div>

    <table class="table table-striped table-hover">
        <thead class="table-light">
            <tr>
                <th>Nombre</th>
                <th>CIF</th>
                <th>Email</th>
                <th>Vacantes</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empresas as $empresa)
                <tr>
                    <td>
                        <a href="{{ route('resenias.show', $empresa->id) }}" class="text-dark text-decoration-none">
                            {{ $empresa->nombre }}
                        </a>
                    </td>
                    <td>{{ $empresa->cif }}</td>
                    <td>{{ $empresa->email }}</td>
                    <td>{{ $empresa->vacantes }}</td>
                    <td>
                        <a href="{{ route('resenias.show', $empresa->id) }}" class="btn btn-info btn-sm">Ver Reseñas</a>
                    </td>
                    {{-- <td>
                        <a href="{{ route('resenias.show', $empresa->id) }}" class="btn btn-info btn-sm">Eliminar Reseñas</a>
                    </td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $empresas->links() }}
</div>

@endsection
