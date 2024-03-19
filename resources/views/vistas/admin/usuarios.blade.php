@extends('layouts.plantillaAdmin')

@section('content')
    <!-- Contenido específico de la página de incidencias -->
    <section id="incidencias">        
        <header>
            <h1>Vista de Usuarios</h1>
        </header>

        <div>
            <h4>¡Hola Administrador!</h4>
        </div>
        
        <!-- Formulario de búsqueda por nombre de cliente con AJAX -->
        <h2 id="tit_filtro">Filtrar por:</h2>
        <form id="searchForm" action="{{ route('incidencia.filtroNombre') }}" method="GET" class="custom-form">
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
            @include('tables.usuarios')
        </div>
    </section>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
