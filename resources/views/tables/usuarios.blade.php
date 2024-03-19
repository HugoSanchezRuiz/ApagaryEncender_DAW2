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
    <!-- Fuente Header -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=EB+Garamond&family=PT+Sans+Narrow&display=swap" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <!-- Título -->
    <title>tbl_usuarios</title>
</head>

<body>
    <div style="margin: 20px;">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Rol</th>
                    <th scope="col">Supervisor</th>
                    <th scope="col">Sede</th>
                    <th scope="col">Estado</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->nombre_usuario }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->rol }}</td>
                        <td>{{ $usuario->supervisor }}</td>
                        <td>{{ isset($sedesMap[$usuario->id_sede]) ? $sedesMap[$usuario->id_sede] : 'Sede Desconocida' }}</td>
                        <td>{{ $usuario->estado }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="text-align: center">No hay resultados</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
