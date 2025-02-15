@extends('template')

@section('tituloNavegador', 'Solicitudes')

@section('contenido')

<div class="container my-5">
    <h2 class="text-center fw-bold mb-4 text-primary">
        <i class="bi bi-list-task me-2"></i>Solicitudes
    </h2>

    <div class="card shadow-sm border-0 rounded-3 mb-4">
        <div class="card-body p-3">
            <a href="{{ route('solicitudes.create') }}" class="btn btn-outline-primary rounded-pill d-flex align-items-center gap-2 mb-3">
                <i class="bi bi-plus-circle"></i>Añadir Solicitud
            </a>

            <a href="{{ route('solicitudes.downloadPdf') }}" class="btn btn-outline-secondary px-4 py-2 rounded-pill d-flex align-items-center gap-2">
                <i class="bi bi-file-earmark-pdf"></i>Descargar informe Solicitudes
            </a>
        </div>
    </div>


    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
            <!-- Tabla para escritorio -->
            <div class="d-none d-md-block">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="py-3"><i class="bi bi-building me-2"></i>Empresa</th>
                                <th class="py-3"><i class="bi bi-briefcase me-2"></i>Actividad</th>
                                <th class="py-3"><i class="bi bi-map me-2"></i>Provincia</th>
                                <th class="py-3"><i class="bi bi-building-lock me-2"></i>Titularidad</th>
                                <th class="py-3"><i class="bi bi-gear me-2"></i>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($solicitudes as $solicitud)
                                <tr>
                                    <td class="py-3">{{ $solicitud->nombreEmpresa }}</td>
                                    <td class="py-3">{{ $solicitud->actividad }}</td>
                                    <td class="py-3">{{ $solicitud->provincia }}</td>
                                    <td class="py-3">{{ $solicitud->titularidad }}</td>
                                    <td class="py-3">
                                        <a href="{{ route('solicitudes.show', $solicitud->empresa_id) }}" class="btn btn-outline-primary btn-sm rounded-pill d-flex align-items-center gap-2">
                                            <i class="bi bi-eye"></i>Ver detalles
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
                @foreach ($solicitudes as $solicitud)
                    <div class="card mb-3 shadow-sm border-0 rounded-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                <i class="bi bi-building me-2"></i>Empresa
                            </h5>
                            <p class="card-text mb-2">{{ $solicitud->nombreEmpresa }}</p>

                            <h5 class="card-title fw-bold mt-3">
                                <i class="bi bi-briefcase me-2"></i>Actividad
                            </h5>
                            <p class="card-text mb-2">{{ $solicitud->actividad }}</p>

                            <h5 class="card-title fw-bold mt-3">
                                <i class="bi bi-map me-2"></i>Provincia
                            </h5>
                            <p class="card-text mb-2">{{ $solicitud->provincia }}</p>

                            <h5 class="card-title fw-bold mt-3">
                                <i class="bi bi-building-lock me-2"></i>Titularidad
                            </h5>
                            <p class="card-text mb-2">{{ $solicitud->titularidad }}</p>

                            <div class="mt-3">
                                <a href="{{ route('solicitudes.show', $solicitud->empresa_id) }}" class="btn btn-outline-primary btn-sm rounded-pill d-flex align-items-center gap-2">
                                    <i class="bi bi-eye"></i>Ver detalles
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-center mt-4">
        {{ $solicitudes->links() }}
    </div>
</div>

@endsection
