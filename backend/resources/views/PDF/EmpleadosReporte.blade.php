<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reporte de Empleados</title>
    <h1>Gobierno Autónomo Descentralizado Municipal del Canton Colta</h1>
    <style>
        /* Puedes agregar estilos CSS aquí según tus necesidades para formatear el PDF */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            color: #333;
        }
    </style>
</head>
<body>
    <h2>Reporte de Empleados</h2>

    @if (!empty($empleados))
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cédula</th>
                    <th>Cargo</th>
                    <th>Unidad</th>
                    <th>Dirección</th>
                    <th>Tipo de Contrato</th>
                    <th>Salario</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->primerNombre }}</td>
                        <td>{{ $empleado->primerApellido }}</td>
                        <td>{{ $empleado->cedula }}</td>
                        <td>{{ $empleado->nombreCargo }}</td>
                        <td>{{ $empleado->nombreUnidad }}</td>
                        <td>{{ $empleado->nombreDireccion }} </td>
                        <td>{{ $empleado->nombreTipoContrato }}</td>
                        <td>{{ $empleado->salario }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay empleados para mostrar en el reporte.</p>
    @endif
</body>
</html>
