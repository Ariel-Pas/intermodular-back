<!DOCTYPE html>
<html>
<head>
    <title>Informe de Reseñas</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1 { text-align: center; color: #007bff; }
        h2 { color: #333; margin-top: 20px; }
        .section { margin-bottom: 30px; }
    </style>
</head>
<body>
    <h1>Informe de Reseñas</h1>

    @foreach ($resenias as $resenia)
        <div class="section">
            <h2>Reseña de {{ $resenia->empresa->nombre }}</h2>

            <table>
                <thead>
                    <tr>
                        <th>Campo</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Pregunta</strong></td>
                        <td>{{ $resenia->pregunta->titulo }}</td>
                    </tr>
                    <tr>
                        <td><strong>Respuesta</strong></td>
                        <td>{{ $resenia->respuesta }}</td>
                    </tr>
                    <tr>
                        <td><strong>Centro</strong></td>
                        <td>{{ $resenia->centro->nombre }}</td>
                    </tr>
                    <tr>
                        <td><strong>Empresa</strong></td>
                        <td>{{ $resenia->empresa->nombre }}</td>
                    </tr>
                    <tr>
                        <td><strong>Fecha de Creación</strong></td>
                        <td>{{ $resenia->created_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach
</body>
</html>
