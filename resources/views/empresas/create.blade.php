@extends('template')

@section('tituloNavegador', 'Nueva empresa')

@section('contenido')
<div class="row">

    <form method="POST" action="{{route('empresas.store')}}" novalidate>
        @csrf
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre de la empresa</label>
          <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">
          @if ($errors->has('nombre'))
            <p class="error-msg">{{$errors->first('nombre')}}</p>
        @endif
        </div>
        <div class="mb-3">
          <label for="cif" class="form-label">CIF</label>
          <input type="text" class="form-control" id="cif" name="cif" value="{{old('cif')}}">
          @if ($errors->has('cif'))
            <p class="error-msg">{{$errors->first('cif')}}</p>
        @endif
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{old('descripcion')}}">
          </div>
          @if ($errors->has('descripcion'))
            <p class="error-msg">{{$errors->first('descripcion')}}</p>
        @endif

        <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}">
        @if ($errors->has('email'))
            <p class="error-msg">{{$errors->first('email')}}</p>
        @endif
        </div>

        <div class="mb-3">
        <label for="direccion" class="form-label">Direccion</label>
        <input type="email" class="form-control" id="direccion" name="direccion" value="{{old('direccion')}}">
        @if ($errors->has('direccion'))
            <p class="error-msg">{{$errors->first('direccion')}}</p>
        @endif
        </div>

        <div class="row">
            <p>Horario</p>
            <div class="col-5">

                <label for="direccion" class="form-label">Apertura por la mañana</label>
                <input type="time" class="form-control" id="ap-manana" name="apManana"
                value="{{old('apManana')}}"
                >
                @if ($errors->has('apManana'))
                    <p class="error-msg">{{$errors->first('apManana')}}</p>
                @endif

                <label for="direccion" class="form-label">Cierre por la mañana</label>
                <input type="time" class="form-control" id="cierre-manana" name="cierreManana"
                value="{{old('cierreManana')}}">
                @if ($errors->has('cierreManana'))
                    <p class="error-msg">{{$errors->first('cierreManana')}}</p>
                @endif
            </div>
            <div class="col-5">
                <label for="direccion" class="form-label">Apertura por la tarde</label>
                <input type="time" class="form-control" id="ap-tarde" name="apTarde"
                value="{{old('apTarde')}}">
                @if ($errors->has('apTarde'))
                    <p class="error-msg">{{$errors->first('apTarde')}}</p>
                @endif

                <label for="direccion" class="form-label">Cierre por la tarde</label>
                <input type="time" class="form-control" id="cierre-tarde" name="cierreTarde"
                value="{{old('cierreTarde')}}">
                @if ($errors->has('cierreTarde'))
                    <p class="error-msg">{{$errors->first('cierreTarde')}}</p>
                @endif
            </div>


        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="finSemana" name="finSemana">
            <label class="form-check-label" for="finSemana"
            @checked(old('finSemana'))
            >Abre los fines de semana</label>
        </div>

        <select class="form-select mb-3" aria-label="Default select example" name="provincia">
            <option >Elige una provincia</option>
            <option
            @selected(old('provincia') == 1)
            value="1">Alicante</option>
            <option value="2"
            @selected(old('provincia') == 2)
            >Valencia</option>
            <option value="3"
            @selected(old('provincia') == 3)
            >Castellón</option>
        </select>
        @if ($errors->has('provincia'))
                <p class="error-msg">{{$errors->first('provincia')}}</p>
        @endif


        <select class="form-select mb-3" aria-label="Default select example" name="poblacion">
            <option >Elige una localidad</option>
            <option value="1"
            @selected(old('poblacion') == 1)
            >Benidorm</option>
            <option value="2"
            @selected(old('poblacion') == 2)
            >La Vila-Joiosa</option>
            <option value="3"
            @selected(old('poblacion') == 3)
            >La Nucía</option>
        </select>
        @if ($errors->has('poblacion'))
                <p class="error-msg">{{$errors->first('poblacion')}}</p>
        @endif

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

</div>

@endsection
