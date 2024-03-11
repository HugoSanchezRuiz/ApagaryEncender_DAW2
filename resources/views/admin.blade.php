@extends('layouts.index')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h1>Bienvenido, {{ Auth::user()->nombre_usuario }} (Administrador)</h1>
            <!-- Aquí puedes mostrar la lista de usuarios, crear nuevos, etc. -->
        </div>
    </div>
@endsection
