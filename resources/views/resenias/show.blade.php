@extends('template')

@section('tituloNavegador', 'Reseñas de ' . $empresa->nombre)

@section('contenido')

<div class="container my-5">
    <h2 class="text-center fw-bold mb-4 text-primary">
        <i class="bi bi-chat-square-text me-2"></i>Reseñas de {{ $empresa->nombre }}
    </h2>


    <div class="mb-4">
        <a href="{{ route('resenias.index') }}" class="btn btn-outline-secondary rounded-pill d-flex align-items-center gap-2">
            <i class="bi bi-arrow-left"></i>Volver
        </a>
    </div>


    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
            <!-- Tabla para escritorio  -->
            <div class="d-none d-md-block">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="py-3"><i class="bi bi-question-circle me-2"></i>Preguntas</th>
                                <th class="py-3"><i class="bi bi-chat-dots me-2"></i>Respuestas</th>
                                <th class="py-3"><i class="bi bi-building me-2"></i>Centro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resenias as $resenia)
                                <tr>
                                    <td class="py-3">
                                        <span class="fw-bold">{{ $resenia->pregunta_id }}</span> - {{ $resenia->pregunta->titulo }}
                                    </td>
                                    <td class="py-3">{{ $resenia->respuesta }}</td>
                                    <td class="py-3">{{ $resenia->centro->nombre }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tarjetas para móviles -->
            <div class="d-block d-md-none">
                @foreach ($resenias as $resenia)
                    <div class="card mb-3 shadow-sm border-0 rounded-3">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                <i class="bi bi-question-circle me-2"></i>Pregunta
                            </h5>
                            <p class="card-text mb-2">
                                <span class="fw-bold">{{ $resenia->pregunta_id }}</span> - {{ $resenia->pregunta->titulo }}
                            </p>

                            <h5 class="card-title fw-bold mt-3">
                                <i class="bi bi-chat-dots me-2"></i>Respuesta
                            </h5>
                            <p class="card-text mb-2">{{ $resenia->respuesta }}</p>

                            <h5 class="card-title fw-bold mt-3">
                                <i class="bi bi-building me-2"></i>Centro
                            </h5>
                            <p class="card-text mb-2">{{ $resenia->centro->nombre }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $resenias->links() }}
    </div>
</div>

@endsection
