<!-- Mostrar la lista de incidencias -->
@foreach($incidents as $incident)
    <p>{{ $incident->title }} - {{ $incident->status }}</p>
@endforeach
