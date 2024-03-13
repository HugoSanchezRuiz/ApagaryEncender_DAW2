<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Bootstrap icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- CSS -->
        <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
        <!-- Título -->
        <title>Vista de administración</title>
    </head>

    <body>
        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" style="font-size: 20px; font-weight: bold; color: #fff;">Página del administrador</a>
            
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#" style="font-size: 16px; color: #fff;">Inicio <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>

            <div class="ml-auto">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 16px; font-weight: bold;">
                        Administrador
                    </button>
                    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="background-color: #fff; border: 1px solid #ced4da; border-radius: 5px;">
                        <a class="dropdown-item" href="#" style="color: #007bff; font-size: 14px;">Ver perfil</a>
                        <a class="dropdown-item" href="#" style="color: #dc3545; font-size: 14px;">Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </nav>
    </body>
</html>