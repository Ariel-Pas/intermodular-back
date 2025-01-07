@extends('template')

@section('tituloNavegador', 'Info de empresa')

@section('contenido')

    <section class="container-md py-3">
       <div class="row">
         <div class="col-6">
             <h1 class="fw-bold">{{$empresa->nombre}}</h1>
             <p>{{$empresa['descripcion']}}</p>
         </div>
         <div class="col-4">
            <img class="img-fluid rounded-4" src="https://images.unsplash.com/photo-1664575602276-acd073f104c1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGVtcHJlc2F8ZW58MHx8MHx8fDA%3D">
         </div>
       </div>
        <p>Más info</p>
        <ul>
            <li>CIF: {{$empresa['cif']}}</li>
            <li>Direccion: {{$empresa['direccion']}}</li>
            <li>Fecha adhesión: {{date('d/m/Y',strtotime($empresa->created_at))}}</li>
        </ul>
    </section>
    <hr>


@endsection
