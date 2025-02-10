@extends('template')

@section('tituloNavegador', $empresa ? 'Editar empresa': 'Nueva empresa')

@section('contenido')

@if ($errors->any())
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
@endif


<div class="row">

    <form method="POST" action="{{$empresa ? route('empresas.update', [$empresa->id]) : route('empresas.store')}}" novalidate enctype="multipart/form-data">
        @if ($empresa) @method('PUT')

        @endif
        @csrf
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre de la empresa</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre', $empresa ? $empresa->nombre : null)}}">
          @if ($errors->has('nombre'))
            <p class="error-msg">{{$errors->first('nombre')}}</p>
        @endif
        </div>
        <div class="mb-3">
          <label for="cif" class="form-label">CIF</label>
          <input type="text" class="form-control" id="cif" name="cif" value="{{old('cif', $empresa ? $empresa->cif : null)}}">
          @if ($errors->has('cif'))
            <p class="error-msg">{{$errors->first('cif')}}</p>
        @endif
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{old('descripcion',$empresa ? $empresa->descripcion : null)}}">
          </div>
          @if ($errors->has('descripcion'))
            <p class="error-msg">{{$errors->first('descripcion')}}</p>
        @endif

        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email', $empresa ? $empresa->email : null)}}">
        @if ($errors->has('email'))
            <p class="error-msg">{{$errors->first('email')}}</p>
        @endif
        </div>

        <div class="mb-3">
        <label for="direccion" class="form-label">Direccion</label>
        <input type="text" class="form-control" id="direccion" name="direccion" value="{{old('direccion', $empresa ? $empresa->direccion : null)}}">
        @if ($errors->has('direccion'))
            <p class="error-msg">{{$errors->first('direccion')}}</p>
        @endif
        </div>

        <div class="row">
            <p>Horario</p>
            <div class="col-5">

                <label for="direccion" class="form-label">Apertura </label>
                <input type="time" class="form-control" id="ap-manana" name="apManana"
                value="{{old('apManana',$empresa ? $empresa->horario_manana : null)}}"
                >
                @if ($errors->has('apManana'))
                    <p class="error-msg">{{$errors->first('apManana')}}</p>
                @endif
            </div>
            <div class="col-5">
                <label for="direccion" class="form-label">Cierre</label>
                <input type="time" class="form-control" id="ap-tarde" name="apTarde"
                value="{{old('apTarde',$empresa ? $empresa->horario_tarde : null)}}">
                @if ($errors->has('apTarde'))
                    <p class="error-msg">{{$errors->first('apTarde')}}</p>
                @endif
            </div>


        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="finSemana" name="finSemana" @checked(old('finSemana', $empresa ? $empresa->finSemana : null))>
            <label class="form-check-label" for="finSemana"

            >Abre los fines de semana</label>
        </div>

        <select class="form-select mb-3" aria-label="Default select example" name="provincia">
            <option >Elige una provincia</option>
            @foreach ($provincias as $provincia)
                <option
                value="{{$provincia->id}}"
                @selected(old('provincia', $empresa ? $empresa->province()->id : null) == $provincia->id)>{{$provincia->name}}</option>
            @endforeach

        </select>
        @if ($errors->has('provincia'))
                <p class="error-msg">{{$errors->first('provincia')}}</p>
        @endif


        <select class="form-select mb-3" aria-label="Default select example" name="poblacion">
            <option >Elige una localidad</option>
            @foreach ($municipios as $municipio){
                <option value={{$municipio->id}}
                @selected(old('poblacion', $empresa ? $empresa->town_id : null) == $municipio->id)
                >{{$municipio->name}}</option>
            }

            @endforeach

        </select>
        @if ($errors->has('poblacion'))
                <p class="error-msg">{{$errors->first('poblacion')}}</p>
        @endif

        <div class="mb-3">
            <label for="vacantes" class="form-label">Vacantes</label>
            <input type="text" class="form-control" id="vacantes" name="vacantes" value="{{old('vacantes',$empresa ? $empresa->vacantes : null)}}">
            @if ($errors->has('vacantes', $empresa ? $empresa->vacantes : null))
                <p class="error-msg">{{$errors->first('vacantes')}}</p>
            @endif
        </div>

        <div class="row">
            <div class="mb-3 col-6">
                <label for="longitud" class="form-label">Longitud</label>
                <input type="number" class="form-control" id="longitud" name="coordX" value="{{old('longitud', $empresa ? $empresa->coordX : null)}}">
                @if ($errors->has('longitud'))
                    <p class="error-msg">{{$errors->first('longitud')}}</p>
                @endif
            </div>
            <div class="mb-3 col-6">
                <label for="latitud" class="form-label">Latitud</label>
                <input type="number" class="form-control" id="latitud" name="coordY" value="{{old('latitud',  $empresa ? $empresa->coordY : null)}}">
                @if ($errors->has('latitud'))
                    <p class="error-msg">{{$errors->first('latitud')}}</p>
                @endif
            </div>
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input class="form-control" type="file" name="imagen" id="">
        </div>



        <div class="mb-3">
            <label for="" class="form-label">Categorías</label>
            <br>
            @foreach ($categorias as $categoria)
                <div>
                    <label class="fw-bold" for="">{{$categoria->nombre}}</label>
                    <div>
                        @foreach ($categoria->servicios as $servicio)

                            @php
                            $servicioSeleccionado = false;
                            if(old('servicios'))
                                $servicioSeleccionado = in_array($categoria->id.'-'.$servicio->id, old('servicios'));
                            else if ($empresa)
                                foreach ($serviciosEmpresa as $linea ) {
                                    if($linea->categoria_id == $categoria->id && $linea->servicio_id == $servicio->id){
                                        $servicioSeleccionado=  true;
                                        break;
                                    }
                                }
                            @endphp


                            <label class="form-check-label" for="">{{$servicio->nombre}} </label>
                            <input class="form-check-input" type="checkbox" name="servicios[]" value="{{$categoria->id}}-{{$servicio->id}}" id="" @checked($servicioSeleccionado)>

                        @endforeach
                    </div>
                </div>


            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>

@endsection
