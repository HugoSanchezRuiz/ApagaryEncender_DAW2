<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    <!-- Fuente Header -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <!-- Título -->
    <title>Vista de administración</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-light bg-light fixed-top" style="margin-bottom: 20px;">
        <div class="container-fluid navbar-content"> <!-- Nuevo contenedor para centrar el contenido -->
            <div style="margin-right: 20px;">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/ApagarEncenderLogo.png') }}" alt="Logo Apagar y Encender" id="imgLogo">
                    <span style="display: flex; align-items: center; margin-left: 10px;">
                        <span style="font-size: larger;">Apagar</span>
                        <span style="font-size: larger; margin-left: 5px;">Encender</span>
                    </span>
                </a>
            </div>

            <div class="central-icons"> <!-- Div central para iconos -->
                <a href="#" class="mx-2" id="btnIncidencias">
                    <i class="bi bi-exclamation-circle"></i>Incidencias
                </a>
                
                <a href="{{ route('vistas.admin.usuarios') }}" class="mx-2" id="btnUsuarios">
                    <i class="bi bi-person-circle"></i>Usuarios
                </a>
            </div>
            
            <div>
                <!-- Dropdowns -->
                <div class="dropdown" style="display: inline-block; margin-right: 10px;">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="bellDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell" style="font-size: larger; font-weight: bold;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="bellDropdown">
                        <!-- Contenido del menú desplegable -->
                        <li><a class="dropdown-item" href="#">Opción 1</a></li>
                        <li><a class="dropdown-item" href="#">Opción 2</a></li>
                        <li><a class="dropdown-item" href="#">Opción 3</a></li>
                    </ul>
                </div>

                <div class="dropdown" style="display: inline-block; margin-right: 10px;">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="chatDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-chat-left" style="font-size: larger; font-weight: bold;"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="chatDropdown">
                        <!-- Contenido del menú desplegable -->
                        <li><a class="dropdown-item" href="#">Opción 1</a></li>
                        <li><a class="dropdown-item" href="#">Opción 2</a></li>
                        <li><a class="dropdown-item" href="#">Opción 3</a></li>
                    </ul>
                </div>

                <div class="dropdown" style="display: inline-block; margin-right: 20px;">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="imgDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('img/AD.png') }}" style="width: 28px;" alt="">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="imgDropdown">
                        <!-- Contenido del menú desplegable -->
                        <li><a class="dropdown-item" href="#">Opción 1</a></li>
                        <li><a class="dropdown-item" href="#">Opción 2</a></li>
                        <li><a class="dropdown-item" href="#">Opción 3</a></li>
                    </ul>
                </div>
            </div>        
        </div>
    </nav>

    <section id="incidencias" style="margin-top: 70px; display: block;">
        <header>
            <h1>Vista de Incidencias</h1>
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
</body>
</html>
