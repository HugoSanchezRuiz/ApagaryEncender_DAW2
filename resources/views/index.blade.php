@extends('layouts.index')

@section('content')

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <style>
            .imagen-container {
                background-color: lightgray;
                /* Cambia el color de fondo según tus preferencias */
                padding: 10px;
                /* Añade algo de espacio alrededor de la imagen */
                border-radius: 5px;
                /* Agrega bordes redondeados */
            }

            /* Estilo para el contenedor de las incidencias */
            .incidents-container {
                background-color: #f8f9fa;
                /* Cambia este color al que desees */
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin-top: 20px;
                /* Ajusta el margen superior según tus necesidades */
            }

            .container-background {
                background-color: #f0f0f0;
                /* Cambia este color al que desees */
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
        </style>
        <title>CRUD</title>
    </head>
    <header>
        <h1 style="padding-top: 80px">Incidencias del cliente</h1>
    </header>

    <br>
    <br>

    <div class="container-background">
        
        <!-- Botones de ordenar -->
        <div style="margin-bottom: 20px;">
            <button type="button" id="ascendenteBtn" class="btn btn-primary">Ascendente</button>
            <button type="button" id="descendenteBtn" class="btn btn-primary">Descendente</button>
        </div>

        <!-- Formulario para filtrar por estado -->
        <form id="filtroForm" style="margin-bottom: 20px;">
            <label for="filtro_estado">Filtrar por Estado:</label>
            <select name="filtro_estado" id="filtro_estado" class="form-control" style="width: 150px;">
                <option value="todos">Todos</option>
                <option value="Sin asignar">Sin asignar</option>
                <option value="Asignada">Asignada</option>
                <option value="Trabajando">Trabajando</option>
                <option value="Resuelta">Resuelta</option>
                <option value="Cerrada">Cerrada</option>
            </select>
        </form>
    </div>



    <br>
    <br>

    <button id="toggleForm" class="btn btn-primary">Crear incidencia</button>

    <!-- Formulario para crear una nueva incidencia -->
    <form id="incidentForm" method="POST" action="{{ route('store') }}" enctype="multipart/form-data" style="display: none;">
        @csrf

        <div class="container" style="max-width: 400px; margin: 0 auto; background-color: #f8f9fa; padding: 20px; border-radius: 8px;">
            <h4 style="text-align: center;">Inserte una incidencia</h4>
            <br>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" required style="max-height: 160px;"></textarea>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen:</label>
                <input type="file" name="imagen" id="imagen" class="form-control-file"
                    onchange="mostrarImagenPreview()">
                <br>
                <div id="imagenContainer" class="imagen-container" style="display: none;">
                    <img id="imagenPreview" alt="Vista previa de la imagen" width="340px" height="350px">
                </div>
                <br>
            </div>


            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select name="categoria" id="categoria" class="form-control" required onchange="obtenerSubcategorias()">
                    <option value="">Seleccionar categoría</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="subcategoria">Subcategoría:</label>
                <select name="subcategoria" id="subcategoria" class="form-control" required>
                    <option value="">Seleccionar subcategoría</option>
                    @foreach ($subcategorias as $subcategoria)
                        <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre_subcategoria }}</option>
                    @endforeach
                </select>
            </div>

            <input type="hidden" name="id_cliente" value="{{ $userId }}">

            <button type="submit" class="btn btn-primary">Crear Incidencia</button>

            <div id="mensaje"></div>
        </div>
    </form>



    <!-- Contenedor para mostrar las incidencias -->
    <div id="incidentList">
    </div>

    <script>
        // Función para cargar las incidencias
        function cargarIncidencias() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/incidencias');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    var incidentList = document.getElementById('incidentList');
                    incidentList.innerHTML = ''; // Limpiar la lista antes de agregar nuevas incidencias

                    // Recorrer cada incidencia y agregarla a la lista
                    data.incidents.forEach(function(incident) {
                        var listItem = document.createElement('div');
                        listItem.innerHTML = `
                        <div class="incidents-container">
                            <h3>ID Incidencia: ${incident.id}</h3>
                            <p><strong>Descripción:</strong> ${incident.descripcion}</p>
                            <p><strong>Estado:</strong> ${incident.estado}</p>
                            <a href="show/${incident.id}" class="btn btn-primary">Ver Detalles</a>
                        </div>
                    `;
                        incidentList.appendChild(listItem);
                    });
                } else {
                    console.error(xhr.responseText);
                }
            };
            xhr.send();
        }

        // Función para ordenar las incidencias
        function ordenarIncidencias(orden) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/incidencias/ordenar?orden=' + orden);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    // Actualizar la lista de incidencias
                    renderizarIncidencias(data);
                } else {
                    console.error(xhr.responseText);
                }
            };
            xhr.send();
        }

        // Función para filtrar las incidencias por estado
        function filtrarIncidencias(estado) {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/incidencias/filtrar?filtro_estado=' + estado);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    // Actualizar la lista de incidencias
                    renderizarIncidencias(data);
                } else {
                    console.error(xhr.responseText);
                }
            };
            xhr.send();
        }

        // Función para renderizar las incidencias en la lista
        function renderizarIncidencias(data) {
            var incidentList = document.getElementById('incidentList');
            incidentList.innerHTML = ''; // Limpiar la lista antes de agregar nuevas incidencias

            // Recorrer cada incidencia y agregarla a la lista
            data.incidents.forEach(function(incident) {
                var listItem = document.createElement('div');
                listItem.innerHTML = `
                <div class="incidents-container">
                            <h3>ID Incidencia: ${incident.id}</h3>
                            <p><strong>Descripción:</strong> ${incident.descripcion}</p>
                            <p><strong>Estado:</strong> ${incident.estado}</p>
                            <a href="show/${incident.id}" class="btn btn-primary">Ver Detalles</a>
                        </div>
            `;
                incidentList.appendChild(listItem);
            });
        }

        // Cargar las incidencias cuando la página se cargue
        cargarIncidencias();

        // Manejar el evento de clic en el botón de ordenar ascendente
        document.getElementById('ascendenteBtn').addEventListener('click', function() {
            ordenarIncidencias('asc');
        });

        // Manejar el evento de clic en el botón de ordenar descendente
        document.getElementById('descendenteBtn').addEventListener('click', function() {
            ordenarIncidencias('desc');
        });

        // Manejar el evento de cambio en el filtro de estado
        document.getElementById('filtro_estado').addEventListener('change', function() {
            var estado = this.value;
            filtrarIncidencias(estado);
        });


        // Mostrar/ocultar formulario de creación de incidencia
        document.getElementById('toggleForm').addEventListener('click', function() {
            document.getElementById('incidentForm').style.display =
                document.getElementById('incidentForm').style.display === 'none' ? 'block' : 'none';
        });

        // Manejar envío del formulario de creación de incidencia
        incidentForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(incidentForm);
            var mensajeDiv = document.getElementById('mensaje')

            var csrftoken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            formData.append('_token', csrftoken);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '/incidencias/store');
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        const data = JSON.parse(xhr.responseText);
                        mensajeDiv.textContent = data.message; // Mostrar mensaje de éxito
                        // Limpia el formulario después de crear la incidencia
                        incidentForm.reset();
                        // Actualiza la lista de incidencias
                        cargarIncidencias();
                    } else {
                        mensajeDiv.textContent = 'Error al crear la incidencia'; // Mostrar mensaje de error
                        console.error('Error:', xhr.statusText);
                    }
                }
            };
            xhr.send(formData);
        });

        function mostrarImagenPreview() {
            var input = document.getElementById('imagen');
            var preview = document.getElementById('imagenPreview');
            var container = document.getElementById('imagenContainer');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
                container.style.display = 'block';
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                container.style.display = 'none';
            }
        }

        function obtenerSubcategorias() {
            var categoriaSeleccionada = document.getElementById('categoria').value;

            // Realiza una petición AJAX para obtener las subcategorías asociadas a la categoría seleccionada
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/subcategorias/' +
                categoriaSeleccionada
                ); // Suponiendo que '/subcategorias/{id_categoria}' es la ruta para obtener las subcategorías asociadas a una categoría
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    actualizarSubcategorias(data
                        .subcategorias); // Llama a una función para actualizar las subcategorías en el formulario
                } else {
                    console.error(xhr.responseText);
                }
            };
            xhr.send();
        }

        function actualizarSubcategorias(subcategorias) {
            var subcategoriaSelect = document.getElementById('subcategoria');
            subcategoriaSelect.innerHTML =
            '<option value="">Seleccionar subcategoría</option>'; // Limpiar las opciones actuales

            // Agregar las nuevas opciones de subcategorías
            subcategorias.forEach(function(subcategoria) {
                var option = document.createElement('option');
                option.value = subcategoria.id;
                option.textContent = subcategoria.nombre_subcategoria;
                subcategoriaSelect.appendChild(option);
            });
        }
    </script>
@endsection
