@extends('template')

@section('tituloNavegador', isset($centro->id) ? 'Actualizar centro' : 'Crear centro')

@section('contenido')
    <div class="container py-5">
        <div class="card shadow-sm p-4 border-0 rounded-3">
            <h2 class="mb-4 text-center">{{ isset($centro->id) ? 'Actualizar Centro' : 'Crear Centro' }}</h2>

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

            {{-- FORMULARIO CENTRO --}}
            <form method="POST" action="{{ isset($centro->id) ? route('centros.update', ['centro' => $centro->id]) : route('centros.store') }}" novalidate>
                @if(isset($centro->id))
                    @method('PUT')
                @endif
                @csrf

                {{-- NOMBRE --}}
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre del centro</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $centro->nombre ?? '') }}">
                    @if ($errors->has('nombre'))
                        <p class="text-danger">{{ $errors->first('nombre') }}</p>
                    @endif
                </div>

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $centro->email ?? '') }}">
                    @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>

                {{-- TELEFONO --}}
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $centro->telefono ?? '') }}">
                    @if ($errors->has('telefono'))
                        <p class="text-danger">{{ $errors->first('telefono') }}</p>
                    @endif
                </div>

                {{-- DIRECCION --}}
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $centro->direccion ?? '') }}">
                    @if ($errors->has('direccion'))
                        <p class="text-danger">{{ $errors->first('direccion') }}</p>
                    @endif
                </div>

                {{-- EMPRESAS RELACIONADAS --}}
                <div class="mb-3">
                    <label class="form-label">Empresas relacionadas</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($empresas as $empresa)
                            <input type="checkbox" class="btn-check" id="empresa_{{ $empresa->id }}" name="empresas[]" value="{{ $empresa->id }}"
                                @if(old('empresas', null) != null) @checked(in_array($empresa->id, old('empresas')))
                                @elseif(isset($centro->id)) @checked($centro->empresas->contains($empresa->id))
                                @endif>
                            <label class="btn btn-outline-secondary" for="empresa_{{ $empresa->id }}">{{ $empresa->nombre }}</label>
                        @endforeach
                    </div>
                    @if ($errors->has('empresas'))
                        <p class="text-danger">{{ $errors->first('empresas') }}</p>
                    @endif
                </div>

                {{-- PROVINCIA --}}
              {{--   <div class="mb-3">
                    <label for="provincia" class="form-label">Provincia</label>
                    <select class="form-select" id="provincia" name="provincia">
                        <option value="">Elige una provincia</option>
                        @foreach ($provincias as $provincia)
                            <option value="{{ $provincia->id }}" @selected(old('provincia', $centro ? $centro->province()->id : '') == $provincia->id)>{{ $provincia->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('provincia'))
                        <p class="text-danger">{{ $errors->first('provincia') }}</p>
                    @endif
                </div> --}}

                {{-- POBLACION --}}
                <div class="mb-3">
                    <label for="poblacion" class="form-label">Localidad</label>
                    <select class="form-select" id="poblacion" name="poblacion">
                        <option value="">Elige una localidad</option>
                        @foreach ($municipios as $municipio)
                            <option value="{{ $municipio->id }}" @selected(old('poblacion', $centro->town_id ?? '') == $municipio->id)>{{ $municipio->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('poblacion'))
                        <p class="text-danger">{{ $errors->first('poblacion') }}</p>
                    @endif
                </div>

                {{-- CICLOS --}}
                <div class="mb-3">
                    <label class="form-label">Ciclos</label>
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($ciclos as $ciclo)
                            @php
                                $cicloChecked = false;
                                if (old('ciclos', null)) $cicloChecked = in_array($ciclo->id, old('ciclos'));
                                if (isset($centro->id)) {
                                    $cicloChecked = $centro->ciclos->contains($ciclo->id);
                                }
                            @endphp
                            <input type="checkbox" class="btn-check" id="ciclo_{{ $ciclo->id }}" name="ciclos[]" value="{{ $ciclo->id }}" @checked($cicloChecked)>
                            <label class="btn btn-outline-secondary" for="ciclo_{{ $ciclo->id }}">{{ $ciclo->nombre }}</label>
                        @endforeach
                    </div>
                    @if ($errors->has('ciclos'))
                        <p class="text-danger">{{ $errors->first('ciclos') }}</p>
                    @endif
                </div>

                {{-- BOTÓN DE ENVÍO --}}
                <div class="d-grid">
                    <button type="submit" class="btn btn-secondary btn-lg">
                        <i class="bi bi-save"></i> {{ isset($centro->id) ? 'Actualizar' : 'Crear' }} Centro
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
