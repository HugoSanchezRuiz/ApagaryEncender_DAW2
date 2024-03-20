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
    <title>tbl_incidencias</title>
</head>

<body>
    <div style="margin: 20px;">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Técnico</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Subcategoria</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Fecha Inicio</th>
                    <th scope="col">Fecha Fin</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($incidencias as $incidencia)
                <tr>
                    <td>{{$incidencia->tecnico_nombre}}</td>
                    <td>{{$incidencia->cliente_nombre}}</td>
                    <td>{{$incidencia->categoria_nombre}}</td>
                    <td>{{$incidencia->subcategoria_nombre}}</td>
                    <td>{{$incidencia->descripcion}}</td>
                    <td>{{$incidencia->imagen}}</td>
                    <td>{{$incidencia->estado}}</td>
                    <td>{{$incidencia->created_at}}</td>
                    <td>{{$incidencia->updated_at}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align: center">No hay resultados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
