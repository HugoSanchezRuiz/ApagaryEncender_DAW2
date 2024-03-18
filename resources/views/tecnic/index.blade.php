@extends('layouts.index')

@section('content')

@foreach($incidentsAssigned as $assignedIncident)
    <div>
        {{-- <p><strong>Descripción:</strong> {{ $assignedIncident->description }}</p> --}}
        <p><strong>Id:</strong> {{ $assignedIncident->id }}</p>
        <p><strong>Categoria:</strong> {{ $assignedIncident->nombre_categoria }}</p>
        
        <!-- Botón para marcar que ha comenzado a trabajar en la incidencia -->
        <form action="{{ route('tecnic.iniciar', $assignedIncident->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Iniciar Trabajo</button>
        </form>

        <!-- Botón para marcar la incidencia como resuelta -->
        <form action="{{ route('tecnic.resolver', $assignedIncident->id) }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success">Marcar como Resuelta</button>
        </form>
    </div>
@endforeach

@endsection



