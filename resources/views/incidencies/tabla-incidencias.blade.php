<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor</title>
    <!-- Vincula el archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
</head>
<body>
    <!-- Tabla de incidencias -->
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Categoría</th>
                <th>Subcategoría</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody id="contenedor-tabla">
            @foreach ($incidenciesNoAssignades as $incidencia)
            <tr class="tabla-row">
                <td>{{ $incidencia->id }}</td>
                <td>{{ $incidencia->descripcion }}</td>
                <td>{{ $incidencia->subcategoria->categoria->nombre_categoria }}</td>
                <td>{{ $incidencia->subcategoria->nombre_subcategoria }}</td>
                <td>
                    <form id="form-asignar-{{ $incidencia->id }}" class="form-asignar" data-id="{{ $incidencia->id }}" action="{{ route('incidencies.assignar', ['idIncidencia' => $incidencia->id]) }}" method="POST">
                        @csrf
                        <select name="idTecnic" class="tabla-select">
                            @foreach ($tecnic as $t)
                            <option value="{{ $t->id }}">{{ $t->nombre_usuario }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="tabla-button">Asignar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
