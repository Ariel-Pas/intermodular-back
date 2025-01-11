@extends('template')

@section('tituloNavegador', 'Centros')

@section('contenido')
@if (session('msg'))
    <div>{{session('msg')}}</div>
@endif
<div class=" my-3">
    <a href="{{route('centros.create')}}">
        <button class="btn btn-primary">Añadir centro</button>
    </a>
</div>
<div class="row">

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Direccion</th>
            <th>Empresas</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody>
          @foreach($centros as $centro)
          <tr>
            <th scope="row">{{$centro->id}}</th>
            <td>{{$centro->nombre}}</td>
            <td>{{$centro->email}}</td>
            <td>{{$centro->direccion}}</td>
            <td>{{$centro->empresas()->implode('nombre', ',')}}</td>
            @if(auth()->check() && auth()->user()->role === 'admin')
            <td>
                <a class="btn btn-primary" href="{{route('centros.edit', $centro->id)}}">
                    Editar
                </a>
            </td>
            @endif
          </tr>
          @endforeach
        </tbody>
    </table>


</div>

@endsection
