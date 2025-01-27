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


        @if(!isset($centro->id))
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
            @if ($errors->has('password'))
            <p class="error-msg">{{$errors->first('password')}}</p>
            @endif

        </div>
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

        <select class="form-select mb-3" aria-label="Default select example" name="provincia" >
            <option  {{!isset($centro) ? 'selected' : ''}}>Elige una provincia</option>
            <option value="1"
            @if(old('provincia', null) != null) @selected(old('provincia') == '1')
            @elseif(isset($centro->id) && $centro->provincia == '1') selected = "true"
            @endif >Alicante</option>
            <option value="2"
            @if(old('provincia', null) != null) @selected(old('provincia') == '2')
            @elseif(isset($centro->id) && $centro->provincia == '2') selected = "true"
            @endif
            >Valencia</option>
            <option value="3"
            @if(old('provincia', null) != null) @selected(old('provincia') == '3')
            @elseif(isset($centro->id) && $centro->provincia == '3') selected = "true"
            @endif>Castellón</option>
        </select>
        @if ($errors->has('provincia'))
            <p class="error-msg">{{$errors->first('provincia')}}</p>
        @endif

        <select class="form-select mb-3" aria-label="Default select example" name="poblacion">
            <option  selected>Elige una localidad</option>
            <option value="1"
            @if(old('poblacion', null) != null) @selected(old('poblacion') == '1')
            @elseif(isset($centro->id) && $centro->poblacion == '1') selected = "true"
            @endif>Benidorm</option>
            <option value="2"
            @if(old('poblacion', null) != null) @selected(old('poblacion') == '2')
            @elseif(isset($centro->id) && $centro->poblacion == '2') selected = "true"
            @endif>La Vila-Joiosa</option>
            <option value="3"
            @if(old('poblacion', null) != null) @selected(old('poblacion') == '3')
            @elseif(isset($centro->id) && $centro->poblacion == '3') selected = "true"
            @endif>La Nucía</option>
        </select>
        @if ($errors->has('poblacion'))
            <p class="error-msg">{{$errors->first('poblacion')}}</p>
        @endif

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>

@endsection
