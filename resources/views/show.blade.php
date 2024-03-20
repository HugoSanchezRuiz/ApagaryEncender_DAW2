<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de la Incidencia</title>
    <link rel="stylesheet" href="styles.css">
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
            font-family: Arial, sans-serif; /* Cambia la fuente a Arial */
        }

        /* Estilos para el encabezado */
        header {
            height: 30vh;
            background-color: #5fa3eb;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-weight: bold; /* Cambia la fuente a negrita */
            color: white;
            text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);
        }

        /* Estilos para los subtítulos */
        h2 {
            margin: 15px 25px;
            font-size: 24px; /* Aumenta el tamaño del subtítulo */
            font-weight: bold;
            font-family: Arial, sans-serif; /* Cambia la fuente a Arial */
        }


        main {
            padding: 20px;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #007bff;
        }

        p {
            margin-bottom: 10px;
        }

        strong {
            font-weight: bold;
        }

        /* Estilos para el botón */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #0056b3;
        }

    </style>
</head>

<body>

    <header>
        <h1>Detalles de la Incidencia</h1>
    </header>

    <main>
        <div class="container">
            <h2>Detalles de la Incidencia con ID {{ $incident->id }}</h2>

            <div>
                <p><strong>Creador:</strong> {{ $cliente->nombre_usuario }}</p>
                <p><strong>Técnico asignado:</strong>
                    @if ($incident->id_tecnico !== null)
                        {{ $tecnico->nombre_usuario }}
                    @else
                        La incidencia no ha sido asignada
                    @endif
                </p>
                <p><strong>Descripción:</strong> {{ $incident->descripcion }}</p>
                <p><strong>Categoría:</strong> {{ $categoria->nombre_categoria }}</p>
                <p><strong>Subcategoría:</strong> {{ $subcategoria->nombre_subcategoria }}</p>
                <p><strong>Estado:</strong> {{ $incident->estado }}</p>
                @if ($incident->imagen)
                    <p><strong>Imagen:</strong></p>
                    <img src="{{$incident->imagen}}" alt="Imagen de la incidencia">
                @endif
            </div>

            <br>
            <br>

            <a href="{{ route('index') }}" class="btn btn-primary">Volver al CRUD de Incidencias</a>
        </div>
    </main>

</body>

</html>
