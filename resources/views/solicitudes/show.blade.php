@extends('template')

@section('tituloNavegador', 'Detalles Solicitudes')

@section('contenido')

<div class="container my-5">
    <h2 class="text-center fw-bold mb-4 text-primary">
        <i class="bi bi-list-task me-2"></i>Solicitudes
    </h2>

    <div class="row justify-content-center">
        <div class="col-12 text-center mb-4">
            <a href="{{ route('solicitudes.index') }}" class="btn btn-outline-primary px-4 py-2 rounded-pill d-flex align-items-center gap-2">
                <i class="bi bi-arrow-left"></i>Volver al listado
            </a>
        </div>
        @foreach($solicitudes as $solicitud)
            <div class="col-md-8 mb-4">
                <div class="card shadow-sm border-0 rounded-4 overflow-hidden hover-scale">
                    <div class="card-header bg-gradient-primary text-center py-4">
                        <h5 class="mb-0 fw-bold ">
                            <i class="bi bi-building me-2"></i>Solicitud de {{ $solicitud->nombreEmpresa }}
                        </h5>
                    </div>
                    <div class="card-body p-4">
                        <div class="mb-3">
                            <p class="mb-2"><strong><i class="bi bi-briefcase me-2"></i>Actividad:</strong> {{ $solicitud->actividad }}</p>
                            <p class="mb-2"><strong><i class="bi bi-card-text me-2"></i>CIF:</strong> {{ $solicitud->cif }}</p>
                            <p class="mb-2"><strong><i class="bi bi-map me-2"></i>Provincia:</strong> {{ $solicitud->provincia }}</p>
                            <p class="mb-2"><strong><i class="bi bi-geo-alt me-2"></i>Localidad:</strong> {{ $solicitud->localidad }}</p>
                            <p class="mb-2"><strong><i class="bi bi-building-lock me-2"></i>Titularidad:</strong> {{ $solicitud->titularidad }}</p>
                            <p class="mb-2"><strong><i class="bi bi-envelope me-2"></i>Email:</strong> {{ $solicitud->email }}</p>
                        </div>

                        <div class="mb-3">
                            <p class="mb-2"><strong><i class="bi bi-clock me-2"></i>Horario:</strong></p>
                            <p class="mb-2"><strong>Desde:</strong> {{ $solicitud->horario_comienzo }} <strong>Hasta:</strong> {{ $solicitud->horario_fin }}</p>
                        </div>

                        <div class="mb-3">
                            <p class="mb-2"><strong><i class="bi bi-house-door me-2"></i>Centro:</strong> {{ $solicitud->centro->nombre }}</p>
                            <p class="mb-2"><strong><i class="bi bi-building me-2"></i>Identificador empresa:</strong> {{ $solicitud->empresa->id }}</p>
                        </div>

                        <button class="btn btn-outline-primary w-100 mb-3 rounded-pill d-flex align-items-center gap-2" type="button" data-bs-toggle="collapse" data-bs-target="#ciclos{{ $solicitud->id }}" aria-expanded="false">
                            <i class="bi bi-list-ul"></i>Ver ciclos solicitados
                        </button>

                        <div class="collapse mb-3" id="ciclos{{ $solicitud->id }}">
                            <ul class="list-group">
                                @foreach($solicitud->ciclos as $ciclo)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <strong>{{ $ciclo->nombre }}</strong>
                                        <span class="badge bg-primary rounded-pill">Puestos: {{ $ciclo->pivot->numero_puestos }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="d-flex justify-content-center gap-3 mt-4">
                            <a href="{{ route('solicitudes.index') }}" class="btn btn-outline-secondary rounded-pill d-flex align-items-center gap-2">
                                <i class="bi bi-arrow-left"></i>Volver
                            </a>
                            <a href="{{ route('solicitudes.edit', $solicitud->id) }}" class="btn btn-outline-success rounded-pill d-flex align-items-center gap-2">
                                <i class="bi bi-pencil"></i>Editar
                            </a>
                            <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" id="deleteForm{{ $solicitud->id }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-outline-danger rounded-pill d-flex align-items-center gap-2" onclick="confirmDelete({{ $solicitud->id }})">
                                    <i class="bi bi-trash"></i>Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¡No podrás revertir esta acción!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar',
            customClass: {
                popup: 'rounded-4',
                confirmButton: 'btn btn-primary rounded-pill',
                cancelButton: 'btn btn-outline-secondary rounded-pill'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('deleteForm' + id).submit();
            }
        });
    }
</script>

@endsection
