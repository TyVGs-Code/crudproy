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
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Lista de Usuarios</h1>
    <table>
        <thead>
            <tr>
                <!-- Encabezados de la tabla basados en los atributos seleccionados -->
                @foreach ($usuarios[0] as $key => $value)
                    <th>{{ ucfirst($key) }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <!-- Mostrar los valores de cada atributo seleccionado -->
                    @foreach ($usuario as $value)
                        <td>{{ $value }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
