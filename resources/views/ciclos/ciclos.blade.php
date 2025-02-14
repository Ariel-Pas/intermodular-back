@extends('template')

@section('tituloNavegador', 'Ciclos')

@section('contenido')
    <div class="container">
        <h2 class="my-4">Gestión de Ciclos</h2>

     
        @if (session('msg'))
            <div class="alert alert-success">{{ session('msg') }}</div>
        @endif

        <div class="card p-3 mb-4 shadow-sm">
            <a class="btn" href="{{ route('ciclos.create') }}">
                <i class="bi bi-plus-circle"></i> Crear Ciclo
            </a>
        </div>


        @foreach ($areas as $area)
            <div class="mb-4">
                <h4 class="my-4">{{ $area->nombre }}</h4>
                <div class="table-responsive">
                    <table class="table table-hover text-center align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($area->ciclos as $ciclo)
                                <tr>

                                    <td>{{ $ciclo->nombre }}</td>


                                    <td class="d-flex justify-content-center">

                                        <a class="align-self-center text-dark ms-3 me-3" href="{{ route('ciclos.edit', [$ciclo->id]) }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>


                                        <form method="POST" action="{{ route('ciclos.destroy', [$ciclo->id]) }}">
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
        @endforeach
    </div>
@endsection
