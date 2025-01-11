@extends('template')

@section('tituloNavegador', 'Login')

@section('contenido')

<h1>Login</h1>

@if (!empty($msg))
    <div class="text-danger">
    {{ $msg }}
    </div>
@endif

<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group">
    <label for="email">Email:</label>
    <input type="text" class="form-control"
    name="email" id="email" />
    </div>
    <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control"
    name="password" id="password" />
    </div>
    <input type="submit" name="enviar" value="Enviar"
    class="btn btn-primary btn-block">
</form>
@endsection
