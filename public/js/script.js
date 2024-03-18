document.getElementById('toggleForm').addEventListener('click', function() {
    var form = document.getElementById('incidentForm');
    form.style.display = form.style.display === 'none' ? 'block' : 'none';
});

//Crear Incidencia

document.getElementById('submitForm').addEventListener('click', function() {
    // Obtener los datos del formulario
    var formData = new FormData(document.getElementById('incidentForm'));

    // Crear una nueva instancia de XMLHttpRequest
    var xhr = new XMLHttpRequest();

    // Configurar la solicitud AJAX
    xhr.open('POST', '{{ route("client.incident.store") }}', true);
    xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

    // Manejar el evento onload
    xhr.onload = function() {
        if (xhr.status === 200) {
            // La solicitud fue exitosa
            document.getElementById('mensaje').innerHTML = '<p>Incidencia creada correctamente.</p>';
        } else {
            // La solicitud falló
            document.getElementById('mensaje').innerHTML = '<p>Error al crear la incidencia.</p>';
        }
    };

    // Enviar la solicitud AJAX con los datos del formulario
    xhr.send(formData);
});





// // Obtener el elemento select de categoría
// var categoriaSelect = document.getElementById('categoria');
// // Obtener el elemento select de subcategoría
// var subcategoriaSelect = document.getElementById('subcategoria');

// // Cuando se seleccione una categoría
// categoriaSelect.addEventListener('change', function() {
//     // Limpiar las opciones existentes en el select de subcategoría
//     subcategoriaSelect.innerHTML = '<option value="">Seleccionar subcategoría</option>';

//     // Obtener el valor seleccionado de la categoría
//     var categoriaId = this.value;

//     // Si se selecciona una categoría
//     if (categoriaId) {
//         // Obtener las subcategorías asociadas a la categoría seleccionada
//         fetch('/obtener_subcategorias/' + categoriaId)
//             .then(response => response.json())
//             .then(data => {
//                 // Recorrer las subcategorías y agregarlas como opciones al select de subcategoría
//                 data.forEach(function(subcategoria) {
//                     var option = document.createElement('option');
//                     option.value = subcategoria.id;
//                     option.text = subcategoria.nombre_subcategoria;
//                     subcategoriaSelect.appendChild(option);
//                 });
//             });
//     }
// });

// document.addEventListener('DOMContentLoaded', function() {
//     document.getElementById('filtroForm').addEventListener('submit', function(event) {
//         // Evitar que el formulario se envíe normalmente
//         event.preventDefault();

//         // Obtener el valor seleccionado del estado
//         var estadoSeleccionado = document.getElementById('filtro_estado').value;

//         // Crear una nueva solicitud XMLHttpRequest
//         var xhr = new XMLHttpRequest();

//         // Configurar la solicitud
//         xhr.open('GET', this.getAttribute('action') + '?filtro_estado=' + estadoSeleccionado);

//         // Definir el manejo de la respuesta
//         xhr.onreadystatechange = function() {
//             if (xhr.readyState === XMLHttpRequest.DONE) {
//                 if (xhr.status === 200) {
//                     // Actualizar el contenido de la página con la respuesta del servidor
//                     document.getElementById('pagina').innerHTML = xhr.responseText;
//                 } else {
//                     console.error('Error:', xhr.status);
//                 }
//             }
//         };

//         // Enviar la solicitud
//         xhr.send();
//     });
// });
document.addEventListener("DOMContentLoaded", function () {
    const filtroEstado = document.getElementById('filtro_estado');

    // Manejar el cambio en el filtro de estado
    filtroEstado.addEventListener('change', function () {
        const estadoSeleccionado = filtroEstado.value;

        // Realizar una solicitud al servidor para obtener las incidencias filtradas
        fetch(`/incidencias?filtro_estado=${estadoSeleccionado}`)
            .then(response => response.json())
            .then(data => {
                mostrarIncidencias(data);
            })
            .catch(error => {
                console.error('Error al obtener incidencias:', error);
            });
    });

    // Función para mostrar las incidencias en el div correspondiente
    function mostrarIncidencias(incidencias) {
        const incidenciasDiv = document.getElementById('incidencias');
        incidenciasDiv.innerHTML = '';

        if (incidencias.length > 0) {
            const ul = document.createElement('ul');
            incidencias.forEach(incidente => {
                const li = document.createElement('li');
                const enlace = document.createElement('a');
                enlace.href = `/incidencias/${incidente.id}`;
                enlace.textContent = `ID Incidencia ${incidente.id} - Estado: ${incidente.estado}`;
                li.appendChild(enlace);
                ul.appendChild(li);
            });
            incidenciasDiv.appendChild(ul);
        } else {
            const mensaje = document.createElement('p');
            mensaje.textContent = 'No hay incidencias disponibles.';
            incidenciasDiv.appendChild(mensaje);
        }
    }
});

// Llamar a la función para mostrar las incidencias al cargar la página
mostrarIncidencias(incidencias);
