@extends('template')

@section('tituloNavegador', 'Ciclos')

@section('contenido')

<div>
    <form action="{{$ciclo ? route('ciclos.update', $ciclo->id) : route('ciclos.store')}}" method="POST">
        @csrf
        @if ($ciclo)
            @method('PUT')
        @endif

        <div class="mb-3">
            <label class="form-label">Área</label>
            <select class="form-select" name="area" id="">
                <option value="">Elige un área</option>
                @foreach ($areas as $area)
                    <option value="{{$area->id}}" @selected(old('area', $ciclo ? $ciclo->areasciclo_id : null) == $area->id)>{{$area->nombre}}</option>
                @endforeach
            </select>
            @if ($errors->has('area'))
            <p class="error-msg">{{$errors->first('area')}}</p>
            @endif
        </div>

        <div class="mb-3">
            <label class="form-label">Nombre</label>
            <input type="text" class="form-control" name="nombre" value="{{old('nombre', $ciclo ? $ciclo->nombre : null)}}">
            @if ($errors->has('nombre'))
            <p class="error-msg">{{$errors->first('nombre')}}</p>
            @endif
        </div>
        <input type="submit" value="Enviar" class="btn btn-primary">
    </form>
</div>



@endsection
