@extends('template')

@section('tituloNavegador', 'Solicitudes')

@section('contenido')

<div class="container">
    <h2 class="text-center font-bold text-2xl mb-4">Solicitudes</h2>

    <table class="table table-striped table-hover">
        <thead class="table-light">
            <tr>
                <th>Empresa</th>
                <th>Actividad</th>
                <th>Provincia</th>
                <th>Titularidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($solicitudes as $solicitud)
                <tr>
                    <td>{{ $solicitud->nombreEmpresa }}</td>
                    <td>{{ $solicitud->actividad }}</td>
                    <td>{{ $solicitud->provincia }}</td>
                    <td>{{ $solicitud->titularidad }}</td>
                    <td>
                        <a href="{{ route('solicitudes.show', $solicitud->empresa_id) }}" class="btn btn-info btn-sm"> Ver detalles</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $solicitudes->links() }}

</div>

@endsection
