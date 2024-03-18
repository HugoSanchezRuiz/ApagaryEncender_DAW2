@extends('layouts.index')

@section('content')
    <div id="pagina">
        <h1>Incidencias del usuario</h1>



        <!-- Formulario para filtrar por estado -->
        <form id="filtroForm" action="" method="GET">
            <label for="filtro_estado">Filtrar por Estado:</label>
            <select name="filtro_estado" id="filtro_estado">
                <option value="">Todos</option>
                <option value="Sin asignar" {{ Request::get('filtro_estado') == 'Sin asignar' ? 'selected' : '' }}>Sin asignar</option>
                <option value="Asignada" {{ Request::get('filtro_estado') == 'Asignada' ? 'selected' : '' }}>Asignada</option>
                <option value="Trabajando" {{ Request::get('filtro_estado') == 'Trabajando' ? 'selected' : '' }}>Trabajando</option>
                <option value="Resuelta" {{ Request::get('filtro_estado') == 'Resuelta' ? 'selected' : '' }}>Resuelta</option>
                <option value="Cerrada" {{ Request::get('filtro_estado') == 'Cerrada' ? 'selected' : '' }}>Cerrada</option>
            </select>
            <input type="hidden" name="orden" value="{{ Request::get('orden') }}">
            <button type="submit">Filtrar</button>
        </form>

        <!-- Formulario para ordenar ascendente o descendente -->
        <form id="ordenForm" action="" method="GET">
            <input type="hidden" name="filtro_estado" value="{{ Request::get('filtro_estado') }}">
            <button type="submit" name="orden" value="asc">Ascendente</button>
            <button type="submit" name="orden" value="desc">Descendente</button>
        </form>


        <button id="toggleForm" class="btn btn-primary">Crear incidencia</button>

        <form id="incidentForm" method="POST" action="" style="display: none;">
            @csrf
            <label for="categoria">Categoría:</label>
            <select name="categoria" id="categoria" required>
                <option value="">Seleccionar categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre_categoria }}</option>
                @endforeach
            </select><br><br>

            <label for="subcategoria">Subcategoría:</label>
            <select name="subcategoria" id="subcategoria" required>
                <option value="">Seleccionar subcategoría</option>
                @foreach ($subcategorias as $subcategoria)
                    <option value="{{ $subcategoria->id }}">{{ $subcategoria->nombre_categoria }}</option>
                @endforeach
            </select><br><br>

            <button type="submit">Crear Incidencia</button>
        </form>

        @if (count($incidents) > 0)
            <ul>
                @foreach ($incidents as $i => $incident)
                    <li>
                        <p><a href="{{ route('client.incident.show', ['id' => $incident->id]) }}">ID Incidencia
                                {{ $incident->id }} </a> - <strong> Estado: </strong> {{ $incident->estado }}</p>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No hay incidencias disponibles.</p>
        @endif

        <div id="incidencias"></div>

    </div>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
