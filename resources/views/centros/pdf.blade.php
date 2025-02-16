
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Centros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
            font-size: 18px;
        }
        .centro {
            margin-bottom: 20px;
            page-break-inside: avoid;
        }
        .centro h2 {
            font-size: 14px;
            margin: 0 0 10px 0;
            color: #333;
        }
        .centro p {
            margin: 2px 0;
        }
        .section-title {
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Lista de Centros</h1>
    </div>

    @foreach($centros as $centro)
        <div class="centro">
            <h2>{{ $centro->nombre }}</h2>
            <p><strong>ID:</strong> {{ $centro->id }}</p>
            <p><strong>Email:</strong> {{ $centro->email }}</p>
            <p><strong>Dirección:</strong> {{ nl2br($centro->direccion) }}</p>
            <p><strong>Teléfono:</strong> {{ $centro->telefono }}</p>
            <p><strong>Empresas</strong></p>
            <ul>
                @foreach ($centro->empresas as $empresa)
                    <li>{{$empresa->nombre}}</li>
                @endforeach
            </ul>
        </div>
        <hr>
    @endforeach
</body>
</html>
