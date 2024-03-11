<!-- Formulario para crear una nueva incidencia -->
<form method="POST" action="{{ route('client.incident.store') }}">
    @csrf
    <label for="title">Título:</label>
    <input type="text" name="title" required>

    <label for="description">Descripción:</label>
    <textarea name="description" required></textarea>

    <button type="submit">Crear Incidencia</button>
</form>
