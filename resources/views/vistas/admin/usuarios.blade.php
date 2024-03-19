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
            <form id="searchForm" action="{{ route('incidencia.filtroNombre') }}" method="GET" class="custom-form">
                <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control" value="{{ request()->input('search') }}" placeholder="-- Nombre --">
                </div>

                <div class="form-group">
                    <select name="sede" id="sede" class="form-control">
                        <option value="" disabled selected>-- Sede --</option>
                        <option value="">Todas</option>
                        @foreach ($sedes as $sede)
                            <option value="{{ $sede->id }}">{{ $sede->nombre_sede }}</option>
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

@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
