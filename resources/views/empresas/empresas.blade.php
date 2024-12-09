@extends('template')

@section('tituloNavegador', 'Empresas')

@section('contenido')
<div class="row">

    @forelse($empresas as $empresa)
        @include('empresas.tarjeta-empresa')

    @empty <p>No hay resultados</p>
    @endforelse

    {{$empresas->links()}}

</div>

@endsection
