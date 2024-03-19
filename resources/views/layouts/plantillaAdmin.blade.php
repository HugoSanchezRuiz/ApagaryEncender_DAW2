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
    <!-- Icono -->
    <link rel="icon" href="{{ asset('img/ApagarEncenderLogo.png') }}">
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
                <a href="{{ route('vistas.admin.incidencias') }}" class="mx-2" id="btnIncidencias">
                    <i class="bi bi-exclamation-circle"></i>Incidencias
                </a>
                
                <a href="{{ route('vistas.admin.usuarios') }}" class="mx-2" id="btnUsuarios">
                    <i class="bi bi-person-circle"></i>Usuarios
                </a>
            </div>
            
            <div>
                <!-- Dropdowns -->
                <div class="dropdown" style="display: inline-block; margin-right: 20px;">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="imgDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('img/AD.png') }}" style="width: 28px;" alt="">
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="imgDropdown">
                        <!-- Contenido del menú desplegable -->
                        <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                    </ul>
                </div>
            </div>        
        </div>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="custom-footer">
        <div class="footer-content">
            <div class="footer-column">
                <h4>Contacto</h4>
                <p><i class="bi bi-person-fill"></i> +123456789</p>
                <p><i class="bi bi-envelope-fill"></i> info@apagarEncender.com</p>
            </div>
            <div class="footer-column">
                <h4>Síguenos</h4>
                <p><i class="bi bi-facebook"></i> <i class="bi bi-whatsapp"></i> <i class="bi bi-instagram"></i></p>
            </div>
            <div class="footer-column">
                <h4>Encuentranos En</h4>
                <p><i class="bi bi-geo-alt"></i>Jesuites Bellvitge - JoanXXIII</p>
            </div>
        </div>
    </footer>
        
    <div style="background-color: yellow;">
        <h2 style="text-align: center; color: black; font-size: 15px; padding: 20px;">¡Alerta! Esta página usa cookies. Muchas Gracias.</h2>
    </div>

    <!-- Bootstrap JS y JQUERY -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- Script para realizar la búsqueda AJAX -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Script para manejar incidencias -->
    <script src="{{ asset('js/incidencias.js') }}"></script>
</body>
</html>
