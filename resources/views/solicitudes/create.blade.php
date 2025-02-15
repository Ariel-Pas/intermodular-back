@extends('template')

@section('tituloNavegador', 'Nueva solicitud')

@section('contenido')

<div class="container-fluid my-5">

    <div class="text-center p-4 bg-white shadow-sm rounded-3 mb-4">
        <h3 class="display-5 fw-semibold text-dark" style="font-family: 'Merriweather', serif; letter-spacing: 1px;">
            <i class="bi bi-file-earmark-plus me-2"></i>Formulario de {{ isset($solicitud) ? 'actualización' : 'creación' }} de solicitudes
        </h3>
    </div>


    @if ($errors->any())
        <div class="alert alert-danger rounded-2 shadow-sm mb-4">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-4">
            <h3 class="mb-4 fw-semibold text-dark" style="font-family: 'Merriweather', serif;">
                <i class="bi bi-building me-2"></i>Información de la Empresa
            </h3>

            <form action="{{ isset($solicitud) ? route('solicitudes.update', $solicitud->id) : route('solicitudes.store') }}" method="post" novalidate>
                @csrf
                @if(isset($solicitud))
                    @method('PUT')
                @endif

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label fw-medium text-secondary">
                            <i class="bi bi-building me-1"></i>Nombre de la empresa
                        </label>
                        <input type="text" class="form-control" name="nombreEmpresa" value="{{ old('nombreEmpresa', $solicitud->nombreEmpresa ?? '') }}" placeholder="Nombre de su empresa">
                        @if ($errors->has('nombreEmpresa'))
                            <p class="text-danger mt-1 small">{{ $errors->first('nombreEmpresa') }}</p>
                        @endif
                    </div>


                    <div class="col-md-6">
                        <label for="cif" class="form-label fw-medium text-secondary">
                            <i class="bi bi-card-text me-1"></i>CIF
                        </label>
                        <input type="text" class="form-control" id="cif" name="cif" value="{{ old('cif', $solicitud->cif ?? '') }}" placeholder="47362837B">
                        @if ($errors->has('cif'))
                            <p class="text-danger mt-1 small">{{ $errors->first('cif') }}</p>
                        @endif
                    </div>


                    <div class="col-md-6">
                        <label for="actividad" class="form-label fw-medium text-secondary">
                            <i class="bi bi-briefcase me-1"></i>Actividad
                        </label>
                        <input type="text" class="form-control" id="actividad" name="actividad" value="{{ old('actividad', $solicitud->actividad ?? '') }}" placeholder="Actividad de su empresa">
                        @if ($errors->has('actividad'))
                            <p class="text-danger mt-1 small">{{ $errors->first('actividad') }}</p>
                        @endif
                    </div>


                    <div class="col-md-6">
                        <label for="provincia" class="form-label fw-medium text-secondary">
                            <i class="bi bi-map me-1"></i>Provincia
                        </label>
                        <select class="form-select" id="provincia" name="provincia">
                            <option value="">Elige una provincia</option>
                            @foreach ($provincias as $prov)
                                <option value="{{ $prov->id }}" @selected(old('provincia', $solicitud->provincia ?? '') == $prov->id)>
                                    {{ $prov->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('provincia'))
                            <p class="text-danger mt-1 small">{{ $errors->first('provincia') }}</p>
                        @endif
                    </div>


                    <div class="col-md-6">
                        <label for="localidad" class="form-label fw-medium text-secondary">
                            <i class="bi bi-geo-alt me-1"></i>Localidad
                        </label>
                        <select class="form-select" name="localidad">
                            <option value="">Elija una localidad</option>
                            @foreach ($municipios as $municipio)
                                <option value="{{ $municipio->id }}" @selected(old('localidad', $solicitud->localidad ?? '') == $municipio->id)>
                                    {{ $municipio->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('localidad'))
                            <p class="text-danger mt-1 small">{{ $errors->first('localidad') }}</p>
                        @endif
                    </div>


                    <div class="col-md-6">
                        <label class="form-label fw-medium text-secondary">
                            <i class="bi bi-clock me-1"></i>Horario
                        </label>
                        <div class="d-flex gap-2">
                            <div class="flex-grow-1">
                                <label for="horario_comienzo" class="form-label small">Inicio</label>
                                <input type="time" class="form-control" name="horario_comienzo" value="{{ old('horario_comienzo', $solicitud->horario_comienzo ?? '') }}">
                                @if ($errors->has('horario_comienzo'))
                                    <p class="text-danger mt-1 small">{{ $errors->first('horario_comienzo') }}</p>
                                @endif
                            </div>
                            <div class="flex-grow-1">
                                <label for="horario_fin" class="form-label small">Fin</label>
                                <input type="time" class="form-control" name="horario_fin" value="{{ old('horario_fin', $solicitud->horario_fin ?? '') }}">
                                @if ($errors->has('horario_fin'))
                                    <p class="text-danger mt-1 small">{{ $errors->first('horario_fin') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <label for="email" class="form-label fw-medium text-secondary">
                            <i class="bi bi-envelope me-1"></i>Email
                        </label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="contact@pixel78.com" value="{{ old('email', $solicitud->email ?? '') }}">
                        @if ($errors->has('email'))
                            <p class="text-danger mt-1 small">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-medium text-secondary">
                            <i class="bi bi-building-lock me-1"></i>Titularidad
                        </label>
                        <div class="d-flex gap-3">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="titularidad" value="Pública" @checked(old('titularidad', $solicitud->titularidad ?? '') == 'Pública')>
                                <label class="form-check-label small">Pública</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="titularidad" value="Privada" @checked(old('titularidad', $solicitud->titularidad ?? '') == 'Privada')>
                                <label class="form-check-label small">Privada</label>
                            </div>
                        </div>
                        @if ($errors->has('titularidad'))
                            <p class="text-danger mt-1 small">{{ $errors->first('titularidad') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="centro_id" class="form-label fw-medium text-secondary">
                            <i class="bi bi-house-door me-1"></i>Centros
                        </label>
                        <select class="form-select" id="centro_id" name="centro_id">
                            <option value="">Elige un centro</option>
                            @foreach ($centros as $centro)
                                <option value="{{ $centro->id }}" @if(old('centro_id', $solicitud->centro->id ?? '') == $centro->id) selected @endif>
                                    {{ $centro->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('centro_id'))
                            <p class="text-danger mt-1 small">{{ $errors->first('centro_id') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="ciclo_id" class="form-label fw-medium text-secondary">
                            <i class="bi bi-book me-1"></i>Ciclos
                        </label>
                        <select class="form-select" id="ciclo_id" name="ciclo_id">
                            <option value="">Elige un ciclo</option>
                            @foreach ($ciclos as $ciclo)
                                <option value="{{ $ciclo->id }}" @if(old('ciclo_id', isset($cicloSeleccionado) && $cicloSeleccionado->id == $ciclo->id ? $ciclo->id : null) == $ciclo->id) selected @endif>
                                    {{ $ciclo->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('ciclo_id'))
                            <p class="text-danger mt-1 small">{{ $errors->first('ciclo_id') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="numero_puestos" class="form-label fw-medium text-secondary">
                            <i class="bi bi-people me-1"></i>Número de puestos
                        </label>
                        <select class="form-select" name="numero_puestos">
                            <option value="">Elija número de puestos</option>
                            @foreach ($numero_puestos as $num)
                                <option value="{{ $num }}" @if(old('numero_puestos', isset($numeroPuestos) ? $numeroPuestos : null) == $num) selected @endif>
                                    {{ $num }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('numero_puestos'))
                            <p class="text-danger mt-1 small">{{ $errors->first('numero_puestos') }}</p>
                        @endif
                    </div>

                    <input type="hidden" name="empresa_id" value="{{ $empresa->id }}">

                    <div class="col-12 mt-4">
                        <div class="d-flex gap-2 justify-content-end">
                            <input type="reset" class="btn btn-outline-secondary btn-sm rounded-pill" value="Limpiar">
                            <input name="submit" type="submit" class="btn btn-primary btn-sm rounded-pill" value="{{ isset($solicitud) ? 'Actualizar' : 'Registrar' }}">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
