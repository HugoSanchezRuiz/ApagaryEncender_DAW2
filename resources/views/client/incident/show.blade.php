@extends('layouts.index')

@section('content')
    <h1>Detalles de la Incidencia</h1>

    <div>
        <p><strong>Categoría:</strong> {{ $categoria->nombre_categoria }}</p>
        <p><strong>Subcategoría:</strong> {{ $subcategoria->nombre_subcategoria }}</p>
        <p><strong>Estado:</strong> {{ $incident->estado }}</p>
        <!-- Otros detalles si los hay -->
    </div>

    <a href="{{ route('client.incident') }}" class="btn btn-primary">Volver al CRUD de Incidencias</a>
@endsection
