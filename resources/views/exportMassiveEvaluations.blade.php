<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluaciones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
    
        h1 {
            text-align: center;
            color: #333;
        }
    
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 50px;
        }
    
        table,
        th,
        td {
            border: 1px solid #ddd;
        }
    
        th,
        td {
            padding: 8px;
            text-align: center; /* Cambiado a "center" para centrar el texto */
        }
    
        th {
            background-color: #f2f2f2;
        }
    
        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <h1>Exportación en PDF</h1>

    <table>
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Dim. 1</th>
                <th>Dim. 2</th>
                <th>Dim. 3</th>
                <th>Dim. 4</th>
                <th>General</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluations as $evaluation)
            <tr>
                <td>
                    <p>{{ $evaluation->professional->user->name }}</p>
                </td>
                <td>
                    <p>{{ $evaluation->interpretation->get(1)['sum'] }}</p>
                    <p>{{ $evaluation->interpretation->get(1)['interpretation'] }}</p>
                    <p>{{ $evaluation->interpretation->get(1)['percentil'] }}</p>
                </td>
                <td>
                    <p>{{ $evaluation->interpretation->get(2)['sum'] }}</p>
                    <p>{{ $evaluation->interpretation->get(2)['interpretation'] }}</p>
                    <p>{{ $evaluation->interpretation->get(2)['percentil'] }}</p>
                </td>
                <td>
                    <p>{{ $evaluation->interpretation->get(3)['sum'] }}</p>
                    <p>{{ $evaluation->interpretation->get(3)['interpretation'] }}</p>
                    <p>{{ $evaluation->interpretation->get(3)['percentil'] }}</p>
                </td>
                <td>
                    <p>{{ $evaluation->interpretation->get(4)['sum'] }}</p>
                    <p>{{ $evaluation->interpretation->get(4)['interpretation'] }}</p>
                    <p>{{ $evaluation->interpretation->get(4)['percentil'] }}</p>
                </td>
                <td>
                    <p>{{ $evaluation->total['sum'] }}</p>
                    <p>{{ $evaluation->total['interpretation'] }}</p>
                    <p>{{ $evaluation->total['percentil'] }}</p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
