@extends('template')

@section('tituloNavegador', 'Reseñas')

@section('contenido')

<div class="container my-5">
    <h2 class="text-center fw-bold mb-4 text-primary">Reseñas</h2>


    <div class="d-flex flex-column flex-md-row justify-content-center gap-3 mb-4">
        <a href="{{ route('resenias.index', ['tipo' => 1]) }}" class="btn btn-outline-primary px-4 py-2 rounded-pill d-flex align-items-center gap-2">
            <i class="bi bi-person-circle"></i>Reseñas a practicantes
        </a>
        <a href="{{ route('resenias.index', ['tipo' => 2]) }}" class="btn btn-outline-success px-4 py-2 rounded-pill d-flex align-items-center gap-2">
            <i class="bi bi-building"></i>Reseñas a empresas
        </a>
        <a href="{{ route('resenias.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill d-flex align-items-center gap-2">
            <i class="bi bi-list-ul"></i>Mostrar todos
        </a>
    </div>


    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
            <!-- Tabla para desktop -->
            <div class="d-none d-md-block">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="py-3"><i class="bi bi-person me-2"></i>Nombre</th>
                                <th class="py-3"><i class="bi bi-card-text me-2"></i>CIF</th>
                                <th class="py-3"><i class="bi bi-envelope me-2"></i>Email</th>
                                <th class="py-3"><i class="bi bi-briefcase me-2"></i>Vacantes</th>
                                <th class="py-3"><i class="bi bi-gear me-2"></i>Ver</th>
                                <th class="py-3"><i class="bi bi-gear me-2"></i>Eliminar</th>
                                <th class="py-3"><i class="bi bi-gear me-2"></i>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($empresas as $empresa)
                                <tr>
                                    <td class="py-3">
                                        <a href="{{ route('resenias.show', $empresa->id) }}" class="text-decoration-none text-dark fw-bold">
                                            {{ $empresa->nombre }}
                                        </a>
                                    </td>
                                    <td class="py-3">{{ $empresa->cif }}</td>
                                    <td class="py-3">{{ $empresa->email }}</td>
                                    <td class="py-3">{{ $empresa->vacantes }}</td>

                                    <td class="py-3">
                                        <a href="{{ route('resenias.show', $empresa->id) }}" class="btn btn-outline-primary btn-sm rounded-pill d-flex align-items-center gap-2">
                                            <i class="bi bi-eye"></i>Ver
                                        </a>
                                    </td>

                                    <td>
                                        <form action="{{ route('resenias.destroy', $empresa->id) }}" method="POST" class="mt-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill d-flex align-items-center gap-2">
                                                <i class="bi bi-trash"></i>Eliminar
                                            </button>
                                        </form>
                                    </td>

                                    <td class="py-3">
                                        <a href="{{ route('resenias.edit', $empresa->id) }}" class="btn btn-outline-warning btn-sm rounded-pill d-flex align-items-center gap-2">
                                            <i class="bi bi-pencil"></i>Editar
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tarjetas para móviles -->
            <div class="d-block d-md-none">
                @foreach ($empresas as $empresa)
                    <div class="card mb-3 shadow-sm border-0 rounded-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                <a href="{{ route('resenias.show', $empresa->id) }}" class="text-decoration-none text-dark">
                                    {{ $empresa->nombre }}
                                </a>
                            </h5>
                            <p class="card-text mb-1"><i class="bi bi-card-text me-2"></i><strong>CIF:</strong> {{ $empresa->cif }}</p>
                            <p class="card-text mb-1"><i class="bi bi-envelope me-2"></i><strong>Email:</strong> {{ $empresa->email }}</p>
                            <p class="card-text mb-1"><i class="bi bi-briefcase me-2"></i><strong>Vacantes:</strong> {{ $empresa->vacantes }}</p>

                            <div class="mt-3">
                                <a href="{{ route('resenias.show', $empresa->id) }}" class="btn btn-outline-primary btn-sm rounded-pill d-flex align-items-center gap-2">
                                    <i class="bi bi-eye"></i>Ver
                                </a>
                            </div>

                            <div class="mt-3">
                                <form action="{{ route('resenias.destroy', $empresa->id) }}" method="POST" class="mt-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-outline-danger btn-sm rounded-pill d-flex align-items-center gap-2 w-100">
                                        <i class="bi bi-trash"></i>Eliminar
                                    </button>
                                </form>
                            </div>

                            <div class="mt-3">
                                <a href="{{ route('resenias.edit', $empresa->id) }}" class="btn btn-outline-warning btn-sm rounded-pill d-flex align-items-center gap-2 w-100">
                                    <i class="bi bi-pencil"></i>Editar
                                </a>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-center mt-4">
        {{ $empresas->links() }}
    </div>
</div>

@endsection
