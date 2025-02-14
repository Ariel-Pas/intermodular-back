@extends('template')

@section('tituloNavegador', 'Nueva solicitud')

@section('contenido')

    <div class="container-fluid">

        <div class="text-center p-5 bg-white shadow rounded">
            <h3 class="display-4"> Formulario de {{ isset($solicitud) ?  'actualización' : 'creación' }} de solicitudes: </h3>
        </div>

        @if ($errors->any())
        <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
        @endif

        <div class="container mt-5">
            <h3 class="mb-4">Información de la Empresa</h3>

                <form action="{{ isset($solicitud) ? route('solicitudes.update', $solicitud->id) : route('solicitudes.store') }}" method="post" novalidate>
                @csrf

                @if(isset($solicitud))
                    @method('PUT')
                @endif

                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label"> Nombre de la empresa</label>
                        <input type="text" class="form-control" name="nombreEmpresa" value="{{ old('nombreEmpresa', $solicitud->nombreEmpresa ?? '') }}" placeholder="Coloque aquí el nombre de su empresa">
                        @if ($errors->has('nombreEmpresa'))
                            <p class="text-danger">{{ $errors->first('nombreEmpresa') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="cif" class="form-label">CIF</label>
                        <input type="text" class="form-control" id="cif" name="cif" value="{{ old('cif', $solicitud->cif ?? '') }}" placeholder="47362837B">
                        @if ($errors->has('cif'))
                            <p class="text-danger">{{ $errors->first('cif') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="actividad" class="form-label">Actividad</label>
                        <input type="text" class="form-control" id="actividad" name="actividad" value="{{ old('actividad', $solicitud->actividad ?? '') }}"
                            placeholder="Escriba aquí la actividad de su empresa">
                        @if ($errors->has('actividad'))
                            <p class="text-danger">{{ $errors->first('actividad') }}</p>
                        @endif
                    </div>


                    <div class="col-md-6">
                        <label for="provincia" class="form-label">Provincia</label>
                        <select class="form-select" id="provincia" name="provincia">
                            <option value="">Elige una provincia</option>
                            @foreach ($provincias as $prov)
                                <option value="{{ $prov->id }}" @selected(old('provincia', $solicitud->provincia ?? '') == $prov->id)>
                                    {{ $prov->name }}
                                </option>

                            @endforeach
                        </select>
                        @if ($errors->has('provincia'))
                            <p class="text-danger">{{ $errors->first('provincia') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="localidad" class="form-label"> Localidad</label>
                        <select class="form-select" name="localidad">
                            <option value="">Elija una localidad</option>
                            @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id }}" @selected(old('localidad', $solicitud->localidad ?? '') == $municipio->id)>
                                    {{ $municipio->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('localidad'))
                            <p class="text-danger">{{ $errors->first('localidad') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label>Horario</label>
                        <div class="d-flex">
                            <label for="horario_comienzo" class="form-label">
                                <input type="time" class="form-control" name="horario_comienzo" value="{{ old('horario_comienzo', $solicitud->horario_comienzo ?? '') }}">
                                @if ($errors->has('horario_comienzo'))
                                    <p class="text-danger">{{ $errors->first('horario_comienzo') }}</p>
                                @endif
                            </label>

                            <label for="horario_fin" class="form-label">
                                <input type="time" class="form-control" name="horario_fin" value="{{ old('horario_fin', $solicitud->horario_fin ?? '') }}">
                                @if ($errors->has('horario_fin'))
                                    <p class="text-danger">{{ $errors->first('horario_fin') }}</p>
                                @endif
                            </label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="contact@pixel78.com" value="{{ old('email', $solicitud->email ?? '') }}">
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="titularidad">Titularidad</label> <br>

                        <input type="radio" name="titularidad" value="Pública"
                            @checked(old('titularidad', $solicitud->titularidad ?? '') == 'Pública')>Pública
                        <input type="radio" name="titularidad" value="Privada"
                            @checked(old('titularidad', $solicitud->titularidad ?? '') == 'Privada')>Privada

                        @if ($errors->has('titularidad'))
                            <p class="text-danger">{{ $errors->first('titularidad') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="centro_id" class="form-label">Centros</label>
                        <select class="form-select" id="centro_id" name="centro_id">
                            <option value="">Elige un centro</option>
                            @foreach ($centros as $centro)
                                <option value="{{ $centro->id }}" @if(old('centro_id', $solicitud->centro->id ?? '') == $centro->id) selected @endif>
                                    {{ $centro->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('centro_id'))
                            <p class="text-danger">{{ $errors->first('centro_id') }}</p>
                        @endif
                    </div>


                    <div class="col-md-6">
                        <label for="ciclo_id" class="form-label">Ciclos</label>
                        <select class="form-select" id="ciclo_id" name="ciclo_id">
                            <option value="">Elige un ciclo</option>
                            @foreach ($ciclos as $ciclo)
                                <option value="{{ $ciclo->id }}"
                                    @if(old('ciclo_id', isset($cicloSeleccionado) && $cicloSeleccionado->id == $ciclo->id ? $ciclo->id : null)
                                    == $ciclo->id) selected @endif>
                                    {{ $ciclo->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('ciclo_id'))
                            <p class="text-danger">{{ $errors->first('ciclo_id') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="numero_puestos" class="form-label">Numero puestos</label>
                        <select class="form-select" name="numero_puestos">
                            <option value="">Elija numero puestos</option>
                            @foreach ($numero_puestos as $num)

                                <option value="{{ $num }}"
                                    @if(old('numero_puestos', isset($numeroPuestos) ? $numeroPuestos : null) == $num) selected @endif>
                                    {{ $num }}
                                </option>

                            @endforeach
                        </select>
                        @if ($errors->has('numero_puestos'))
                            <p class="text-danger">{{ $errors->first('numero_puestos') }}</p>
                        @endif
                    </div>


                    <input type="hidden" name="empresa_id" value="{{ $empresa->id  }}">

                </div>

                <input name="submit" type="submit" value=" {{  isset($solicitud) ? 'Actualizar' : 'Registrar' }}">
                <input type="reset" value="Limpiar">

        </div>
        </form>

    </div>
    </div>

@endsection
