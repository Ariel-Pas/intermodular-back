<!DOCTYPE html>
<html>
<head>
    <title>Informe de Solicitudes</title>
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
    <h1>Informe de Solicitudes</h1>

    @foreach ($solicitudes as $solicitud)
        <div class="section">
            <h2>Solicitud de {{ $solicitud->nombreEmpresa }}</h2>

            <table>
                <thead>
                    <tr>
                        <th>Campo</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Actividad</strong></td>
                        <td>{{ $solicitud->actividad }}</td>
                    </tr>
                    <tr>
                        <td><strong>CIF</strong></td>
                        <td>{{ $solicitud->cif }}</td>
                    </tr>
                    <tr>
                        <td><strong>Provincia</strong></td>
                        <td>{{ $solicitud->provincia }}</td>
                    </tr>
                    <tr>
                        <td><strong>Localidad</strong></td>
                        <td>{{ $solicitud->localidad }}</td>
                    </tr>
                    <tr>
                        <td><strong>Titularidad</strong></td>
                        <td>{{ $solicitud->titularidad }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>{{ $solicitud->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Horario</strong></td>
                        <td>Desde: {{ $solicitud->horario_comienzo }} - Hasta: {{ $solicitud->horario_fin }}</td>
                    </tr>
                    <tr>
                        <td><strong>Centro</strong></td>
                        <td>{{ $solicitud->centro->nombre }}</td>
                    </tr>
                    <tr>
                        <td><strong>Identificador Empresa</strong></td>
                        <td>{{ $solicitud->empresa->id }}</td>
                    </tr>
                </tbody>
            </table>

            <h3>Ciclos Solicitados</h3>
            <table>
                <thead>
                    <tr>
                        <th>Ciclo</th>
                        <th>Puestos solicitados</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($solicitud->ciclos as $ciclo)
                        <tr>
                            <td>{{ $ciclo->nombre }}</td>
                            <td>{{ $ciclo->pivot->numero_puestos }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</body>
</html>
