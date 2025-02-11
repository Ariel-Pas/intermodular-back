@extends('template')

@section('tituloNavegador', $empresa ? 'Editar empresa' : 'Nueva empresa')

@section('contenido')
    <div class="container py-5">
        <div class="card shadow-sm p-4 border-0 rounded-3">
            <h2 class="mb-4 text-center">{{ $empresa ? 'Editar Empresa' : 'Crear Empresa' }}</h2>

            {{-- MENSAJES DE AVISO --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- FORMULARIO EMPRESA --}}
            <form method="POST" action="{{ $empresa ? route('empresas.update', [$empresa->id]) : route('empresas.store') }}" novalidate enctype="multipart/form-data">
                @if ($empresa)
                    @method('PUT')
                @endif
                @csrf

                {{-- NOMBRE --}}
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la empresa</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $empresa ? $empresa->nombre : null) }}">
                    @if ($errors->has('nombre'))
                        <p class="text-danger">{{ $errors->first('nombre') }}</p>
                    @endif
                </div>

                {{-- CIF --}}
                <div class="mb-3">
                    <label for="cif" class="form-label">CIF</label>
                    <input type="text" class="form-control" id="cif" name="cif" value="{{ old('cif', $empresa ? $empresa->cif : null) }}">
                    @if ($errors->has('cif'))
                        <p class="text-danger">{{ $errors->first('cif') }}</p>
                    @endif
                </div>

                {{-- DESCRIPCIÓN --}}
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $empresa ? $empresa->descripcion : null) }}">
                    @if ($errors->has('descripcion'))
                        <p class="text-danger">{{ $errors->first('descripcion') }}</p>
                    @endif
                </div>

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $empresa ? $empresa->email : null) }}">
                    @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                {{-- DIRECCIÓN --}}
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $empresa ? $empresa->direccion : null) }}">
                    @if ($errors->has('direccion'))
                        <p class="text-danger">{{ $errors->first('direccion') }}</p>
                    @endif
                </div>

                {{-- HORARIO --}}
                <div class="mb-3">
                    <label class="form-label">Horario</label>
                    <div class="row">
                        <div class="col-6">
                            <label for="ap-manana" class="form-label">Apertura</label>
                            <input type="time" class="form-control" id="ap-manana" name="apManana" value="{{ old('apManana', $empresa ? $empresa->horario_manana : null) }}">
                            @if ($errors->has('apManana'))
                                <p class="text-danger">{{ $errors->first('apManana') }}</p>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="ap-tarde" class="form-label">Cierre</label>
                            <input type="time" class="form-control" id="ap-tarde" name="apTarde" value="{{ old('apTarde', $empresa ? $empresa->horario_tarde : null) }}">
                            @if ($errors->has('apTarde'))
                                <p class="text-danger">{{ $errors->first('apTarde') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- FIN DE SEMANA --}}
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="finSemana" name="finSemana" @checked(old('finSemana', $empresa ? $empresa->finSemana : null))>
                    <label class="form-check-label" for="finSemana">Abre los fines de semana</label>
                </div>

                {{-- PROVINCIA --}}
                <div class="mb-3">
                    <label for="provincia" class="form-label">Provincia</label>
                    <select class="form-select" id="provincia" name="provincia">
                        <option value="">Elige una provincia</option>
                        @foreach ($provincias as $provincia)
                            <option value="{{ $provincia->id }}" @selected(old('provincia', $empresa ? $empresa->province()->id : null) == $provincia->id)>{{ $provincia->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('provincia'))
                        <p class="text-danger">{{ $errors->first('provincia') }}</p>
                    @endif
                </div>

                {{-- POBLACIÓN --}}
                <div class="mb-3">
                    <label for="poblacion" class="form-label">Localidad</label>
                    <select class="form-select" id="poblacion" name="poblacion">
                        <option value="">Elige una localidad</option>
                        @foreach ($municipios as $municipio)
                            <option value="{{ $municipio->id }}" @selected(old('poblacion', $empresa ? $empresa->town_id : null) == $municipio->id)>{{ $municipio->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('poblacion'))
                        <p class="text-danger">{{ $errors->first('poblacion') }}</p>
                    @endif
                </div>

                {{-- VACANTES --}}
                <div class="mb-3">
                    <label for="vacantes" class="form-label">Vacantes</label>
                    <input type="number" class="form-control" id="vacantes" name="vacantes" value="{{ old('vacantes', $empresa ? $empresa->vacantes : null) }}">
                    @if ($errors->has('vacantes'))
                        <p class="text-danger">{{ $errors->first('vacantes') }}</p>
                    @endif
                </div>

                {{-- COORDENADAS --}}
                <div class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <label for="longitud" class="form-label">Longitud</label>
                            <input type="number" class="form-control" id="longitud" name="coordX" value="{{ old('longitud', $empresa ? $empresa->coordX : null) }}">
                            @if ($errors->has('longitud'))
                                <p class="text-danger">{{ $errors->first('longitud') }}</p>
                            @endif
                        </div>
                        <div class="col-6">
                            <label for="latitud" class="form-label">Latitud</label>
                            <input type="number" class="form-control" id="latitud" name="coordY" value="{{ old('latitud', $empresa ? $empresa->coordY : null) }}">
                            @if ($errors->has('latitud'))
                                <p class="text-danger">{{ $errors->first('latitud') }}</p>
                            @endif
                        </div>
                    </div>
                </div>

                {{-- IMAGEN --}}
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" id="imagen" name="imagen">
                </div>

                {{-- CATEGORÍAS Y SERVICIOS --}}

                <div class="mb-3">
                    <label class="form-label">Categorías</label>
                    @foreach ($categorias as $categoria)
                        <div class="mb-2">
                            <label class="fw-bold">{{ $categoria->nombre }}</label>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($categoria->servicios as $servicio)
                                    @php
                                        $servicioSeleccionado = false;
                                        if (old('servicios'))
                                            $servicioSeleccionado = in_array($categoria->id . '-' . $servicio->id, old('servicios'));
                                        elseif ($empresa)
                                            foreach ($serviciosEmpresa as $linea) {
                                                if ($linea->categoria_id == $categoria->id && $linea->servicio_id == $servicio->id) {
                                                    $servicioSeleccionado = true;
                                                    break;
                                                }
                                            }
                                    @endphp
                                    {{-- Checkbox with Bootstrap button style --}}
                                    <input type="checkbox" class="btn-check" name="servicios[]" value="{{ $categoria->id }}-{{ $servicio->id }}" id="servicio_{{ $servicio->id }}" @checked($servicioSeleccionado)>
                                    <label class="btn btn-outline-secondary" for="servicio_{{ $servicio->id }}">{{ $servicio->nombre }}</label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- BOTÓN DE ENVÍO --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-secondary btn-lg">
                        <i class="bi bi-save"></i> {{ $empresa ? 'Actualizar' : 'Crear' }} Empresa
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
