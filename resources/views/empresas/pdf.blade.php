<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Empresas</title>
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
        .empresa {
            margin-bottom: 20px;
            page-break-inside: avoid; /* Evita que una empresa se divida en dos páginas */
        }
        .empresa h2 {
            font-size: 14px;
            margin: 0 0 10px 0;
            color: #333;
        }
        .empresa p {
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
        <h1>Lista de Empresas</h1>
    </div>

    @foreach($empresas as $empresa)
        <div class="empresa">
            <h2>{{ $empresa->nombre }}</h2>
            <p><strong>ID:</strong> {{ $empresa->id }}</p>
            <p><strong>CIF:</strong> {{ $empresa->cif }}</p>
            <p><strong>Descripción:</strong> {{ $empresa->descripcion }}</p>
            <p><strong>Email:</strong> {{ $empresa->email }}</p>
            <p><strong>Dirección:</strong> {{ nl2br($empresa->direccion) }}</p>
            <p><strong>Coordenadas:</strong> ({{ $empresa->coordX }}, {{ $empresa->coordY }})</p>
            <p><strong>Horario:</strong> {{ $empresa->horario_manana }} - {{ $empresa->horario_tarde }}</p>
            <p><strong>Fin de Semana:</strong> {{ $empresa->finSemana ? 'Sí' : 'No' }}</p>
            <p><strong>Nota media de los alumnos:</strong> {{ $empresa->puntuacionMedia() }}</p>
            <p><strong>Vacantes:</strong> {{ $empresa->vacantes }}</p>
        </div>
        <hr>
    @endforeach
</body>
</html>
