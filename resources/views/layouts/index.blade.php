<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <style>
        /* Reset de márgenes para todos los elementos */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    margin: 0;
    background-color: rgb(254, 248, 248);
}

/* Estilos para dropdown */
.btn-secondary {
    background-color: lightgray;
}

/* Estilos para el logotipo en la barra de navegación */
.navbar-brand {
    display: flex;
    align-items: center;
}

/* Estilos para el logotipo dentro de la barra de navegación */
#imgLogo {
    width: 55px;
    float: left;
    margin-right: 10px;
}

/* Estilos para los elementos de texto dentro de la barra de navegación */
span {
    font-size: 15px;
}

/* Estilos para el menú desplegable */
.dropdown-menu {
    min-width: 150px;
}

.dropdown-menu a {
    padding: 0.5rem 1rem;
}

/* Estilos al pasar el ratón sobre los elementos del menú desplegable */
.dropdown-menu a:hover {
    background-color: #f8f9fa;
}

/* Estilos para centrar el contenido dentro de la barra de navegación */
.navbar-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
}

/* Estilos para los iconos centrales en la barra de navegación */
.central-icons {
    display: flex;
    align-items: center;
    margin-right: 10px;
}

.central-icons a {
    display: inline-flex;
    align-items: center;
    margin: 0 10px;
    text-decoration: none;
    color: #000;
    transition: color 0.3s;
}

.central-icons a:hover {
    color: #007bff;
}

/* Estilos para el encabezado */
header {
    height: 30vh;
    background-color: #5fa3eb;
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    font-family: 'EB Garamond', serif;
    font-weight: bolder;
    color: white;
    text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);
}

/* Estilos para los subtítulos */
h4 {
    margin: 15px 25px;
    font-size: 20px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-weight: bolder;
}

#tit_filtro {
    margin: 15px 25px;
    font-size: 18px;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-weight: bolder;
}

/* Estilos formulario */
form {
    margin: 15px 25px;
    width: calc(100% - 50px);
}

.custom-form {
    display: flex;
    align-items: center;
}

.custom-form .form-group {
    margin-right: 10px;
}

/* Estilos tabla */
table {
    font-size: 15px;
}

/* Estilos para las secciones */
#incidentList {
    margin-top: 70px;
    margin-left: 0px;
    margin-right: 0px;
    background-color: white;
}

.container {
    margin-top: 70px;
    margin-left: 2px;
    margin-right: 2px;
}

/* Footer */
footer {
    background-color: #343a40;
    padding: 20px 0;
    text-align: center;
}

.footer-content {
    display: flex;
    justify-content: space-around;
}

.footer-column {
    flex: 1;
}

footer p {
    margin: 5px 0;
    color: white;
}

footer h4 {
    color: #fff;
}

    </style>
</head>
<body>

    <!-- Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-4">
        <div class="container">
            <span class="text-muted">© 2024 Mi Aplicación. Todos los derechos reservados.</span>
        </div>
    </footer>
</body>
</html>
