@extends('template')

@section('tituloNavegador', 'Editar Usuario')

@section('contenido')
    <div class="container">
        <h2 class="my-4">Editar Usuario <i class="bi bi-arrow-right"></i> [<strong>Nombre: </strong>{{$usuario->nombre}}]  [<strong>ID: </strong> {{$usuario->id}}]</h2>
    </div>
@endsection
