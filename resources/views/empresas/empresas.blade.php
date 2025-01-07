@extends('template')

@section('tituloNavegador', 'Empresas')

@section('contenido')
@if (session('msg'))
    <div>{{session('msg')}}</div>
@endif
<div class=" my-3">
    <a href="{{route('empresas.create')}}">
        <button class="btn btn-primary">Añadir empresa</button>
    </a>
</div>
<div class="row">

    @forelse($empresas as $empresa)
        @include('empresas.tarjeta-empresa')

    @empty <p>No hay resultados</p>
    @endforelse

    {{$empresas->links()}}

</div>

@endsection
