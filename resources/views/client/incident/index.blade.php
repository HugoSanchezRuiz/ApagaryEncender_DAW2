@extends('layouts.index')

@section('content')
    <h1>Incidencias del usuario</h1>

    <button id="toggleForm" class="btn btn-primary">Crear incidencia</button>

    <form id="incidentForm" method="POST" action="{{ route('client.incident.store') }}" style="display: none;">
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
        </select><br><br>

        <button type="submit">Crear Incidencia</button>
    </form>

    @if (count($incidents) > 0)
        <ul>
            @foreach ($incidents as $i => $incident)
                <li>
                    <p><a href="{{ route('client.incident.show', ['id' => $incident->id]) }}">Incidencia {{ $i + 1 }} </a> - <strong> Estado: </strong> {{ $incident->estado }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>No hay incidencias disponibles.</p>
    @endif

    <script>
        document.getElementById('toggleForm').addEventListener('click', function() {
            var form = document.getElementById('incidentForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
        });

        // Obtener el elemento select de categoría
        var categoriaSelect = document.getElementById('categoria');
        // Obtener el elemento select de subcategoría
        var subcategoriaSelect = document.getElementById('subcategoria');

        // Cuando se seleccione una categoría
        categoriaSelect.addEventListener('change', function() {
            // Limpiar las opciones existentes en el select de subcategoría
            subcategoriaSelect.innerHTML = '<option value="">Seleccionar subcategoría</option>';

            // Obtener el valor seleccionado de la categoría
            var categoriaId = this.value;

            // Si se selecciona una categoría
            if (categoriaId) {
                // Obtener las subcategorías asociadas a la categoría seleccionada
                fetch('/obtener_subcategorias/' + categoriaId)
                    .then(response => response.json())
                    .then(data => {
                        // Recorrer las subcategorías y agregarlas como opciones al select de subcategoría
                        data.forEach(function(subcategoria) {
                            var option = document.createElement('option');
                            option.value = subcategoria.id;
                            option.text = subcategoria.nombre_subcategoria;
                            subcategoriaSelect.appendChild(option);
                        });
                    });
            }
        });
    </script>
@endsection
