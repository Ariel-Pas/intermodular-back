@extends('template')

@section('tituloNavegador', 'Empresas')

@section('contenido')
<div class="row">

    @forelse($empresas as $empresa)
        @include('partials.tarjeta-empresa')

    @empty <p>No hay resultados</p>
    @endforelse

</div>

@endsection
