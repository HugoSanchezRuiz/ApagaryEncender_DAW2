@extends('layouts.plantillaAdmin')

@section('content')
    <!-- Contenido específico de la página de incidencias -->
    <section id="usuarios"> 
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
                    url: $('#searchForm').attr('action'),
                    type: 'GET',
                    data: $('#searchForm').serialize(),
                    success: function(response) {
                        $('#usuariosTable').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error al filtrar usuarios:', error);
                        // Aquí puedes agregar código para manejar el error, como mostrar un mensaje al usuario
                    }
                });
            }

            // Evento para capturar cambios en los filtros y llamar a la función de filtrado
            $('#searchForm input, #searchForm select').on('change keyup', function() {
                filtrarUsuarios();
            });

            // Manejar la selección "Todos" en los filtros
            $('#estado, #sede, #supervisor, #rol').on('change', function() {
                if ($(this).val() === '') {
                    // Si se selecciona "Todos", restablecer el formulario y volver a filtrar
                    $('#searchForm').trigger('reset');
                    filtrarUsuarios();
                }
            });

            // Filtrar usuarios al cargar la página
            filtrarUsuarios();
        });
    </script>
@endsection
