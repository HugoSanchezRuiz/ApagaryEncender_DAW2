@extends('layouts.plantillaAdmin')

@section('content')
    <!-- Contenido específico de la página de incidencias -->
    <section id="usuarios" style="border: 1px solid;"> 
        <div style="background-color: white">
            <header>
                <h1>Vista de Usuarios</h1>
            </header>

            <div>
                <h4>¡Hola Administrador!</h4>
            </div>
            
            <!-- Formulario de búsqueda por nombre de cliente con AJAX -->
            <h2 id="tit_filtro">Filtrar por:</h2>
            <form id="searchForm" action="{{ route('usuarios.filtrar') }}" method="GET" class="custom-form">
                <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control" value="{{ request()->input('search') }}" placeholder="-- Nombre --">
                </div>

                <div class="form-group">
                    <select name="supervisor" id="supervisor" class="form-control">
                        <option value="" disabled selected>-- Supervisor --</option>
                        <option value="">Todos</option>
                        <option value="1">Si</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="form-group">
                    <select name="estado" id="estado" class="form-control">
                        <option value="" disabled selected>-- Estado --</option>
                        <option value="">Todos</option>
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>
                </div>

                <div class="form-group">
                    <select name="sede" id="sede" class="form-control">
                        <option value="" disabled selected>-- Sedes --</option>
                        <option value="">Todas</option>
                        @foreach ($sedes as $sede)
                            <option value="{{ $sede->id }}">{{ $sede->nombre_sede }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <select name="rol" id="rol" class="form-control">
                        <option value="" disabled selected>-- Rol --</option>
                        <option value="">Todos</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol }}">{{ $rol }}</option>
                        @endforeach
                    </select>
                </div>
            </form>

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Contenedor de la tabla de usuarios -->
            <div id="usuariosTable">
                @include('tables.usuarios')
            </div>
        </div>       
    </section>

    <!-- Agrega el código JavaScript aquí -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Función para enviar el formulario de búsqueda y actualizar la tabla de usuarios
            function filtrarUsuarios() {
                $.ajax({
                    url: "{{ route('usuarios.filtrar') }}", // Ruta del controlador para filtrar usuarios
                    type: 'GET',
                    data: $('#searchForm').serialize(), // Serializar el formulario
                    success: function(response) {
                        $('#usuariosTable').html(response);
                        // Mostrar mensajes de éxito o error si están presentes en la respuesta
                        if (response.includes('alert-success')) {
                            $('.alert-success').fadeIn().delay(3000).fadeOut(); // Muestra el mensaje de éxito durante 3 segundos
                        } else if (response.includes('alert-danger')) {
                            $('.alert-danger').fadeIn().delay(3000).fadeOut(); // Muestra el mensaje de error durante 3 segundos
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al filtrar usuarios:', error);
                        // Muestra un mensaje de error al usuario
                        $('.alert-danger').html('Error al filtrar usuarios. Por favor, inténtalo de nuevo más tarde.').fadeIn().delay(3000).fadeOut();
                    }
                });
            }
        
            // Evento para capturar cambios en los filtros y llamar a la función de filtrado
            $('#searchForm input, #searchForm select').on('change keyup', function() {
                filtrarUsuarios();
            });
        
            // Filtrar usuarios al cargar la página
            filtrarUsuarios();
        });
    </script>
@endsection
