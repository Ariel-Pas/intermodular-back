@extends('template')


@section('tituloNavegador', isset($centro->id) ? 'Actualizar centro' : 'Crear centro')

@section('contenido')



<div class="row">
    @if($errors->any())
        @foreach ($errors->all() as $error)
        <span>{{$error}}</span>
        @endforeach
    @endif ($errors)


    <form method="POST" action="{{ isset($centro->id) ? route('centros.update', ['centro'=>$centro->id]) : route('centros.store')}}" novalidate>
        @if(isset($centro->id))
            @method('PUT')
        @endif
        @csrf
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre del centro</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre', $centro->nombre)}}">
        </div>
        @if ($errors->has('nombre'))
            <p class="error-msg">{{$errors->first('nombre')}}</p>
        @endif



        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{old('email', $centro->email)}}">
            @if ($errors->has('email'))
            <p class="error-msg">{{$errors->first('email')}}</p>
            @endif
        </div>


        <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="email" class="form-control" id="telefono" name="telefono" value="{{old('telefono', $centro->telefono)}}">
            @if ($errors->has('telefono'))
            <p class="error-msg">{{$errors->first('telefono')}}</p>
            @endif
        </div>

    <div class="mb-3">
        <label for="direccion" class="form-label">Direccion</label>
        <input type="text" class="form-control" id="direccion" name="direccion" value="{{old('direccion', $centro->direccion)}}">
        @if ($errors->has('direccion'))
            <p class="error-msg">{{$errors->first('direccion')}}</p>
            @endif
    </div>

        <div class="my-3 form-check">
            <p>Empresas relacionadas</p>
            <div class="row">
                @foreach($empresas as $empresa)
                    <div class="col-2">
                        <input type="checkbox" class="form-check-input" value="{{$empresa->id}}" name="empresas[]"

                        @if(old('empresas', null) != null) @checked(in_array($empresa->id, old('empresas')))

                        @elseif(isset($centro->id)) @checked($centro->empresas->firstWhere('id', $empresa->id) !== null)

                        @endif
                        >
                        <label class="form-check-label" for="{{'empresasCheck'.$empresa->nombre}}">{{$empresa->nombre}}</label>

                    </div>
                @endforeach
            </div>
        </div>

        <select class="form-select mb-3" aria-label="Default select example" name="provincia">
            <option >Elige una provincia</option>
            @foreach ($provincias as $provincia)
                <option
                value="{{$provincia->id}}"
                @selected(old('provincia', $centro->id ? $centro->province()->id : null) == $provincia->id)>{{$provincia->name}}</option>
            @endforeach

        </select>
        @if ($errors->has('provincia'))
                <p class="error-msg">{{$errors->first('provincia')}}</p>
        @endif


        <select class="form-select mb-3" aria-label="Default select example" name="poblacion">
            <option >Elige una localidad</option>
            @foreach ($municipios as $municipio){
                <option value={{$municipio->id}}
                @selected(old('poblacion', $centro->id ? $centro->town_id : null) == $municipio->id)
                >{{$municipio->name}}</option>
            }

            @endforeach

        </select>
        @if ($errors->has('poblacion'))
                <p class="error-msg">{{$errors->first('poblacion')}}</p>
        @endif


        <div class="my-3 form-check">
            <p>Ciclos</p>
            <div class="row">
                @foreach($ciclos as $ciclo)

                    @php
                        $cicloChecked = false;
                        if(old('ciclos', null)) $cicloChecked = in_array($ciclo->id, old('ciclos'));
                        if ($centro->id) {
                            //comprobar si existe un ciclo con el id actual en los ciclos del centro
                            $cicloEnCentro = $centro->ciclos->find($ciclo->id);
                            //dd($centro->ciclos);
                            if ($cicloEnCentro){

                                $cicloChecked = true;
                            }
                        }
                    @endphp

                    <div class="col-2">
                        <input type="checkbox" class="form-check-input" value="{{$ciclo->id}}" name="ciclos[]"
                        @checked($cicloChecked)
                        >
                        <label class="form-check-label" >{{$ciclo->nombre}}</label>

                    </div>
                @endforeach
                @if ($errors->has('ciclos'))
                <p class="error-msg">{{$errors->first('ciclos')}}</p>
        @endif
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>

@endsection
