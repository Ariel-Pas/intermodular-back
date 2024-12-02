<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    {{-- <header>Inicio de {{strtoupper($usuario)}}</header> --}}
    <a href="{{route('hacersaludo')}}">
        <p>Ir a saludo</p>
    </a>
    <main>

            @forelse ($empresas as $item)
                <h2>{{$loop->index +1}} de {{$loop->count}} :{{$item['nombre']}}</h2>
                <ul>
                    @if ($loop->first) <span>La número 1</span>
                    @endif
                    @if ($loop->last) <span>La última</span>
                    @endif
                    <li>Sector: {{$item['sector']}}</li>
                    <li>Ubicación: {{$item['ubicacion']}}</li>
                    <li>Empleados: {{$item['empleados']}}</li>
                </ul>

            @empty
                <li>No hay elementos</li>
            @endforelse

    </main>
</body>
</html>

