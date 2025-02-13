@extends('template')

@section('tituloNavegador', 'Centros')

@section('contenido')
    <div class="container">
        <h2 class="my-4">Gestión de Centros</h2>

        {{-- MENSAJES DE AVISO --}}
        @if (session('msg'))
            <div class="alert alert-success">{{session('msg')}}</div>
        @endif

        {{-- AGREGAR NUEVO CENTRO --}}
        <div class="card p-3 mb-4 shadow-sm">
            <a class="btn" href="{{route('centros.create')}}"><i class="bi bi-plus-circle"></i> Añadir Centro</a>
        </div>

        {{-- LISTADO DE CENTROS --}}
        <h4 class="my-4">Listado de Centros</h4>

        <div class="table-responsive">
            <table class="table table-hover text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Dirección</th>
                        <th>Empresas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($centros as $centro)
                    <tr>
                        {{-- ID CENTRO --}}
                        <td>{{$centro->id}}</td>
                        {{-- DATOS CENTRO --}}
                        <td>{{$centro->nombre}}</td>
                        <td>{{$centro->email}}</td>
                        <td>{{$centro->direccion}}</td>
                        <td>{{$centro->empresas()->implode('nombre', ', ')}}</td>
                        <td class="d-flex justify-content-center">
                            <a class="align-self-center text-dark ms-3 me-3" href="{{route('centros.edit', $centro->id)}}"><i class="bi bi-pencil-square"></i></a>
                            {{-- ELIMINAR CENTRO --}}
                            <form method="POST" action="{{route('centros.destroy', $centro->id)}}">
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
