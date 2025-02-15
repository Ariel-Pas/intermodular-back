<!DOCTYPE html>
<html>
<head>
    <title>Informe de Usuarios</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        h1 { text-align: center; color: #007bff; }
        h2 { color: #333; margin-top: 20px; }
        .section { margin-bottom: 30px; }
        .badge { padding: 5px 10px; border-radius: 12px; font-size: 14px; }
        .bg-primary { background-color: #007bff; color: #fff; }
        .bg-secondary { background-color: #6c757d; color: #fff; }
        .bg-success { background-color: #28a745; color: #fff; }
    </style>
</head>
<body>
    <h1>Informe de Usuarios</h1>

    @foreach ($usuarios as $usuario)
        <div class="section">
            <h2>Usuario: {{ $usuario->nombre }} {{ $usuario->apellidos }}</h2>

            <table>
                <thead>
                    <tr>
                        <th>Campo</th>
                        <th>Valor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>ID de Usuario</strong></td>
                        <td>{{ $usuario->id }}</td>
                    </tr>
                    <tr>
                        <td><strong>Nombre</strong></td>
                        <td>{{ $usuario->nombre }}</td>
                    </tr>
                    <tr>
                        <td><strong>Apellidos</strong></td>
                        <td>{{ $usuario->apellidos }}</td>
                    </tr>
                    <tr>
                        <td><strong>Email</strong></td>
                        <td>{{ $usuario->email }}</td>
                    </tr>
                    <tr>
                        <td><strong>Centro Asociado</strong></td>
                        <td>
                            @if($usuario->centro)
                                <span class="badge bg-primary">{{ $usuario->centro->nombre }}</span>
                            @else
                                <span class="badge bg-secondary">No asignado</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Roles</strong></td>
                        <td>
                            @if($usuario->roles->isNotEmpty())
                                @foreach($usuario->roles as $rol)
                                    <span class="badge bg-success">{{ $rol->nombre }}</span>
                                @endforeach
                            @else
                                <span class="badge bg-secondary">Sin roles asignados</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Fecha de Alta</strong></td>
                        <td>{{ $usuario->created_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach
</body>
</html>
