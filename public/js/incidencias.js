$(document).ready(function() {
    // Función para actualizar la tabla de incidencias
    function actualizarTabla() {
        var formData = $('#searchForm').serialize(); // Obtener los datos del formulario

        $.ajax({
            url: $('#searchForm').attr('action'),
            type: 'GET',
            data: formData,
            success: function(response) {
                $('#incidenciasTable').html(response); // Actualizar la tabla de incidencias con los nuevos resultados
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    // Actualizar la tabla cuando se cambia el valor en el campo de búsqueda o el estado
    $('#search').on('keyup', function() {
        actualizarTabla();
    });

    $('#estado, #categoria').on('change', function() {
        actualizarTabla();
    });

    // Evitar envío del formulario cuando se presiona Enter
    $('#searchForm').on('keypress', function(e) {
        if (e.which === 13) { // 13 es el código de tecla para Enter
            e.preventDefault();
        }
    });
});
