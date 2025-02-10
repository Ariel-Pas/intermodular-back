@extends('template')

@section('tituloNavegador', 'Detalles Solicitudes')

@section('contenido')

<div class="container my-5">
    <h2 class="text-center font-weight-bold mb-4">Solicitudes</h2>

    <div class="d-flex justify-content-center mt-4 mb-3">
        <a href="{{ route('solicitudes.create') }}" class="btn btn-primary">Crear nueva empresa</a>
    </div>

    <div class="row justify-content-center">
        @if($solicitudes->isEmpty())
            <div class="col-12 text-center">
                <p class="alert alert-warning">No hay solicitudes disponibles.</p>
                <a href="{{ route('solicitudes.index') }}" class="btn btn-dark px-4 py-2">Volver</a>
            </div>
        @else
            @foreach($solicitudes as $solicitud)
                <div class="col-md-8 mb-4">
                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                        <div class="card-header bg-dark text-white text-center">
                            <h5 class="mb-0">Solicitud de {{ $solicitud->empresa->nombre }}</h5>
                            {{-- <img src="{{ $solicitud->empresa->imagen }}" alt="Logo de {{ $solicitud->empresa->nombre }}" class="img-fluid rounded mx-auto d-block" style="max-width: 150px; height: auto;"> --}}
                        </div>
                        <div class="card-body p-4">
                            <p><strong>Actividad:</strong> {{ $solicitud->actividad }}</p>
                            <p><strong>CIF:</strong> {{ $solicitud->cif }}</p>
                            <p><strong>Provincia:</strong> {{ $solicitud->provincia }}</p>
                            <p><strong>Localidad:</strong> {{ $solicitud->localidad }}</p>
                            <p><strong>Titularidad:</strong> {{ $solicitud->titularidad }}</p>
                            <p><strong>Email:</strong> {{ $solicitud->email }}</p>

                            <p class="mt-3"><strong><u>Horario:</u></strong></p>
                            <p><strong>Desde:</strong> {{ $solicitud->horario_comienzo }} <strong>Hasta:</strong> {{ $solicitud->horario_fin }}</p>

                            <p><strong>Centro:</strong> {{ $solicitud->centro->nombre }}</p>
                            <p><strong>Identificador empresa:</strong> {{ $solicitud->empresa->id }}</p>
                            <button class="btn btn-secondary w-50 mb-2" type="button" data-bs-toggle="collapse" data-bs-target="#ciclos{{ $solicitud->id }}" aria-expanded="false">
                                Ver ciclos solicitados
                            </button>

                            <div class="collapse" id="ciclos{{ $solicitud->id }}">
                                <ul class="list-group">
                                    @foreach($solicitud->ciclos as $ciclo)
                                        <li class="list-group-item">
                                            <strong>{{ $ciclo->nombre }}</strong> <span class="badge bg-secondary rounded-pill">  Puestos: {{ $ciclo->pivot->numero_puestos }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('solicitudes.index') }}" class="btn btn-secondary">Volver</a>
                                <a href="" class="btn btn-success">Editar</a>
                               <form action="{{ route('solicitudes.destroy', $solicitud->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta solicitud?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

@endsection
