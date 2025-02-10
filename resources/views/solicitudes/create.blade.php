@extends('template')

@section('tituloNavegador', 'Nueva solicitud')

@section('contenido')

    <div class="container-fluid">

        <div class="text-center p-5 bg-white shadow rounded">
            <h3 class="display-4"> Formulario de creacion de solicitudes: </h3>
        </div>

        @if (session('msg'))
            <div>{{session('msg')}}</div>
        @endif

        <div class="container mt-5">
            <h3 class="mb-4">Información de la Empresa</h3>

            <form action="{{ route('solicitudes.store') }}" method="post" novalidate>
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label"> Nombre de la empresa</label>
                        <input type="text" class="form-control" name="nombreEmpresa" value="{{ old('nombreEmpresa') }}" placeholder="Coloque aquí el nombre de su empresa">
                        @if ($errors->has('nombreEmpresa'))
                            <p class="text-danger">{{ $errors->first('nombreEmpresa') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="cif" class="form-label">CIF</label>
                        <input type="text" class="form-control" id="cif" value="{{ old('cif') }}" placeholder="47362837B">
                        @if ($errors->has('cif'))
                            <p class="text-danger">{{ $errors->first('cif') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="actividad" class="form-label">Actividad</label>
                        <input type="text" class="form-control" id="actividad" value="{{ old('actividad') }}"
                            placeholder="Escriba aquí la actividad de su empresa">
                        @if ($errors->has('actividad'))
                            <p class="text-danger">{{ $errors->first('actividad') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="provincia" class="form-label">Provincia</label>
                        <select class="form-select" id="provincia" name="provincia">
                            <option value="">Elige una provincia</option>
                            <option value="1" @selected(old('provincia') == '1')> Alicante </option>
                            <option value="2" @selected(old('provincia') == '1')> Valencia </option>
                            <option value="3" @selected(old('provincia') == '1')> Castellón </option>
                        </select>
                        @if ($errors->has('provincia'))
                            <p class="text-danger">{{ $errors->first('provincia') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="localidad" class="form-label"> Localidad</label>
                        <select class="form-select" name="localidad">
                            <option value="">Elija una localidad</option>
                            <option value="1" @selected(old('localidad') == '1')>Benidorm</option>
                            <option value="1" @selected(old('localidad') == '2')>Ademuz</option>
                            <option value="1" @selected(old('localidad') == '3')>Alcora</option>
                        </select>
                        @if ($errors->has('localidad'))
                            <p class="text-danger">{{ $errors->first('localidad') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label>Horario</label>
                        <div class="d-flex">
                            <label for="horario_comienzo" class="form-label">
                                <input type="time" class="form-control" name="horario_comienzo" value="{{ old('horario_comienzo') }}">
                                @if ($errors->has('horario_comienzo'))
                                    <p class="text-danger">{{ $errors->first('horario_comienzo') }}</p>
                                @endif
                            </label>

                            <label for="horario_fin" class="form-label">
                                <input type="time" class="form-control" name="horario_fin" value="{{ old('horario_fin') }}">
                                @if ($errors->has('horario_fin'))
                                    <p class="text-danger">{{ $errors->first('horario_fin') }}</p>
                                @endif
                            </label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="contact@pixel78.com" value="{{ old('email') }}">
                        @if ($errors->has('email'))
                            <p class="text-danger">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="titularidad">Titularidad</label> <br>
                        <input type="radio" name="titularidad" value="Publica" @checked(old('titularidad') == 'Publica')>Publica
                        <input type="radio" name="titularidad" value="Privada" @checked(old('titularidad') == 'Privada')>Privada
                        @if ($errors->has('titularidad'))
                            <p class="text-danger">{{ $errors->first('titularidad') }}</p>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="centro_id" class="form-label">Centros</label>
                        <select class="form-select" id="centro_id" name="centro_id">
                            <option value="">Elige un centro</option>
                            @foreach ($centros as $centro)
                                <option value="{{ $centro->id }}" @selected(old('centro_id') == $centro->id)>
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
                                <option value="{{ $ciclo->id }}">{{ $ciclo->nombre }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('ciclo_id'))
                            <p class="text-danger">{{ $errors->first('ciclo_id') }}</p>
                        @endif
                    </div>



                {{-- <table class="table">
                    <thead>
                      <tr>
                        <th>Ciclo formativo</th>
                        <th>Nº de alumnos</th>
                      </tr>
                    </thead>
                    <tbody>
                        @for(ciclo of ciclos$ | async; track ciclo.id) {
                          <tr>
                            <td>{{ ciclo.nombre }}</td>
                            <td>
                              <input type="hidden" [value]="ciclo.id">
                              <input type="number" class="form-control" [formControl]="getCicloControl(ciclo.id)" min="1">
                            </td>
                          </tr>
                        }
                    </tbody>
                  </table> --}}

                    <input type="hidden" formControlName="empresa_id">

                </div>

                <input name="submit" type="submit" value="Registrar">
                <input type="reset" value="Limpiar">

        </div>
        </form>

    </div>
    </div>

@endsection
