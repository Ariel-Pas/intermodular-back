@extends('template')

@section('tituloNavegador', 'Editar Empresa')

@section('contenido')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="text-center mb-4">
                <h2 class="text-center fw-bold mb-4 text-primary">Editar Solicitud</h2>
                <p class="text-muted small">Actualiza el nombre de la empresa de manera sencilla.</p>
            </div>

            <div class="card border-0 shadow-sm rounded-lg">
                <div class="card-body p-4">
                    <form action="{{ route('resenias.update', $empresa->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-medium small text-muted">Nombre de la Empresa</label>
                            <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" value="{{ $empresa->nombre }}" required placeholder="Ingrese el nombre">
                        </div>

                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('resenias.index') }}" class="btn btn-sm btn-outline-secondary px-3">Cancelar</a>
                            <button type="submit" class="btn btn-sm btn-outline-primary px-3">Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
