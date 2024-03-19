<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestor</title>
    <!-- Vincula el archivo CSS -->
    <link rel="stylesheet" href="{{ asset('css/tabla.css') }}">
    <!-- Vincula la librería SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h1>Incidències no assignades</h1>

    <!-- Agregar el nombre del usuario -->
    <p>Bienvenido, {{ Auth::user()->nombre_usuario }}</p>
    <!-- Div contenedor de la tabla de incidencias -->
    <div>
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
            <tbody >
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
    </div>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Función para actualizar la tabla de incidencias
            function actualizarTabla() {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', '{{ route('incidencies.no-assignades') }}');
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        var response = xhr.responseText;
                        document.getElementById('contenedor-tabla').innerHTML = response;
                        asignarEventosFormulario();
                    } else {
                        console.error('Error en la solicitud AJAX');
                    }
                };
                xhr.send();
            }

            // Actualizar la tabla cada 10 segundos (10000 milisegundos)
            var intervalID = setInterval(actualizarTabla, 10);

            // Asignar eventos a los formularios de asignación
            function asignarEventosFormulario() {
                var formularios = document.getElementsByClassName('form-asignar');
                for (var i = 0; i < formularios.length; i++) {
                    formularios[i].addEventListener('submit', function (event) {
                        event.preventDefault();
                        clearInterval(intervalID); // Detener el intervalo mientras se asigna
                        var idIncidencia = this.getAttribute('data-id');
                        var idTecnico = this.querySelector('select[name="idTecnic"]').value;
                        asignarIncidencia(idIncidencia, idTecnico);
                    });
                }
            }

            // Función para asignar una incidencia
            function asignarIncidencia(idIncidencia, idTecnico) {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('incidencies.assignar') }}');
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            console.log('Incidencia asignada correctamente'); // Verificar en la consola
                            actualizarTabla();
                            // Mostrar SweetAlert
                            Swal.fire({
                                icon: 'success',
                                title: 'Incidencia asignada correctamente',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            intervalID = setInterval(actualizarTabla, 10000); // Reanudar el intervalo después de asignar
                        } else {
                            console.error('Error al asignar la incidencia');
                        }
                    } else {
                        console.error('Error en la solicitud AJAX');
                    }
                };
                xhr.send(JSON.stringify({ idIncidencia: idIncidencia, idTecnic: idTecnico }));
            }

            // Llamar a la función para cargar la tabla inicialmente
            actualizarTabla();
        });
    </script>
</body>
</html>
