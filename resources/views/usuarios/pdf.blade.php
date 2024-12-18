<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Lista de Usuarios</h1>
    <table>
        <thead>
            <tr>
                <!-- Mostrar los encabezados dinámicos de las columnas -->
                @foreach ($usuarios[0]->getAttributes() as $key => $value)
                    <th>{{ ucfirst($key) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <!-- Mostrar los valores de los atributos -->
                    @foreach ($usuario->getAttributes() as $value)
                        <td>{{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
