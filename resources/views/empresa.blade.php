@extends('template')

@section('tituloNavegador', 'Info de empresa')

@section('contenido')
    <section>
        <h1>{{$empresa['nombre']}}</h1>
        <p>{{$empresa['descripcion']}}</p>
        <p>Más info</p>
        <ul>
            <li>CIF: {{$empresa['cif']}}</li>
            <li>Direccion: {{$empresa['direccion']}}</li>
        </ul>
    </section>


@endsection
