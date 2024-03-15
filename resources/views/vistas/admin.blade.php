<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> 
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>       
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
                    <i class="bi bi-exclamation-circle">  Incidencias</i>
                </a>
                <a href="#" class="mx-2" id="btnUsuarios">
                    <i class="bi bi-person-circle">  Usuarios</i>
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
            <h4>¡Hola Administrador! </h4>
        </div>

        <div style="margin: 20px;">
            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>

                    <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>

                    <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <section id="usuarios" style="margin-top: 70px; display: none;">
        <header>
            <h1>Vista de Usuarios</h1>
        </header>

        <div>
            <h4>¡Hola Administrador! </h4>
        </div>
    </section>

    <script>
        document.getElementById('btnIncidencias').addEventListener('click', function() {
            document.getElementById('incidencias').style.display = 'block';
            document.getElementById('usuarios').style.display = 'none';
        });

        document.getElementById('btnUsuarios').addEventListener('click', function() {
            document.getElementById('incidencias').style.display = 'none';
            document.getElementById('usuarios').style.display = 'block';
        });
    </script>
</body>
</html>