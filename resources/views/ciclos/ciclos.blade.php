@extends('template')

@section('tituloNavegador', 'Ciclos')

@section('contenido')

<div class="row">
    @if (session('msg'))
    <div>{{session('msg')}}</div>
    @endif
    <div>
        <a href="{{route('ciclos.create')}}">
            <button class="btn btn-primary">Crear ciclo</button>
        </a>
    </div>
    @foreach ($areas as $area)
        <h5>{{$area->nombre}}</h5>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th>Editar</th>
                <th>Borrar</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($area->ciclos as $ciclo)

                <tr>
                    <td>{{$ciclo->nombre}}</td>
                    <td><a href="{{route('ciclos.edit', [$ciclo->id])}}">
                        <button class="btn btn-primary">
                            Editar
                        </button>
                    </a></td>
                    <td>
                        <form action="{{route('ciclos.destroy', [$ciclo->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar" class="btn btn-danger">
                        </form>
                    </td>
                </tr>



            @endforeach
            </tbody>

        </table>
    @endforeach


</div>


@endsection
