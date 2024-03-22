@extends('layouts.plantillaAdmin')

@section('content')
    <section id="incidencias" style="margin-top: 70px; display: block; border: 1px solid;">
        <header>
            <h1>Vista de Incidencias</h1>
        </header>

        <div>
            <h4>¡Hola Administrador!</h4>
        </div>
        
        <!-- Formulario de búsqueda por nombre de cliente con AJAX -->
        <h2>Filtrar por:</h2>
        <form id="searchForm" action="{{ route('incidencias.filtrar') }}" method="GET" class="custom-form">
            <div class="form-group">
                <input type="text" name="search" id="search" class="form-control" value="{{ request()->input('search') }}" placeholder="-- Nombre --">
            </div>

            <div class="form-group">
                <select name="estado" id="estado" class="form-control">
                    <option value="" disabled selected>-- Estado --</option>
                    <option value="">Todas</option>
                    @foreach ($estados as $estado)
                        <option value="{{ $estado }}">{{ $estado }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <select name="categoria" id="categoria" class="form-control">
                    <option value="" disabled selected>-- Categoría --</option>
                    <option value="">Todas</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria }}">{{ $categoria }}</option>
                    @endforeach
                </select>
            </div>
        </form>

        <div>
            <h2>Crear subcategoria:</h2>
            <button type="button" class="btn btn-primary" id="btn-crearIncidencia" data-toggle="modal" data-target="#modal_incidencia">Crear</button>
        </div>

        <!-- Contenedor de la tabla de incidencias -->
        <div id="incidenciasTable">
            @include('tables.incidencias')
        </div>
    </section>

    <!-- Modal de crear incidencia -->
    <div class="modal fade" id="modal_incidencia" tabindex="-1" role="dialog" aria-labelledby="modal_incidencia" aria-hidden="true">        
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modallogin">Crear subcategoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="" method="post" id="frmlogin" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="categoria_modal">Categoría:</label>
                            <select name="categoria_modal" id="categoria_modal" class="form-control">
                                <option value="" disabled selected>-- Selecciona una categoría --</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria }}">{{ $categoria }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="subcategoria">Subcategoría:</label>
                            <select name="subcategoria" id="subcategoria" class="form-control">
                                <option value="" disabled selected>-- Selecciona una subcategoría --</option>
                                <!-- Las opciones se cargarán dinámicamente mediante JavaScript una vez que se seleccione una categoría -->
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Crear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y JQUERY -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Script para realizar la búsqueda AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Script para manejar incidencias -->
    <script src="{{ asset('js/incidencias.js') }}"></script>
@endsection
