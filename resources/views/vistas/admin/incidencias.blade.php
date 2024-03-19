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
        <h2 id="tit_filtro">Filtrar por:</h2>
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

        <!-- Contenedor de la tabla de incidencias -->
        <div id="incidenciasTable">
            @include('tables.incidencias')
        </div>
    </section>

    <!-- Bootstrap JS y JQUERY -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Script para realizar la búsqueda AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Script para manejar incidencias -->
    <script src="{{ asset('js/incidencias.js') }}"></script>
@endsection
