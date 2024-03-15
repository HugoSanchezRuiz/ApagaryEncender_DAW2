<!-- resources/views/layouts/index.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de tu aplicación</title>
    <script src="{{ asset('js/loginVal.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Agrega aquí tus enlaces a hojas de estilo, scripts, etc. -->
    <!-- Por ejemplo, si estás utilizando Bootstrap: -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div id="app">
    <!-- Contenido principal -->
    @yield('content')
</div>

<!-- Agrega aquí tus scripts, por ejemplo, Vue.js o Axios para AJAX -->
<!-- Por ejemplo, si estás utilizando Bootstrap: -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
