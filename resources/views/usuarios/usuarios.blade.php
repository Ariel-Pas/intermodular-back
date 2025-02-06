@extends('template')

@section('tituloNavegador', 'Usuarios')

@section('contenido')
    <div class="container">
        <h2 class="my-4">Gestión de Usuarios</h2>

        {{-- MENSAJES DE AVISO --}}
        @if (session('msg'))
            <div class="alert alert-success">{{session('msg')}}</div>
        @endif

        {{-- AGREGAR NUEVO USUARIO --}}
        <div class="card p-3 mb-4 shadow-sm">
            <a class="btn" href="{{route('usuarios.create')}}"><i class="bi bi-person-plus"></i> Crear Usuario</a>
        </div>

        {{-- LISTADO DE USUARIOS --}}
        <h4 class="my-4">Listado de Usuarios</h4>

        <div class="table-responsive">
            <table class="table table-hover text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>ID Centro</th>
                        <th>Fecha de Alta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                    <tr>
                        {{-- ID USUARIO --}}
                        <td>{{$usuario->id}}</td>
                        {{-- DATOS USUARIO --}}
                        <td>{{$usuario->nombre}}</td>
                        <td>{{$usuario->apellidos}}</td>
                        <td>{{$usuario->email}}</td>
                        <td>{{$usuario->centro_id}}</td>
                        <td>{{$usuario->created_at}}</td>
                        <td class="d-flex justify-content-center">
                            <a class="align-self-center text-dark" href="{{route('usuarios.edit', $usuario->id)}}"><i class="bi bi-pencil-square"></i></a>
                            <form method="POST" action="{{route('usuarios.destroy', $usuario->id)}}">
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
