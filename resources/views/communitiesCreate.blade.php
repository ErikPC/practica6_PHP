<form method="POST" action="{{ route('communities.create') }}">
    @csrf

    <div>
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" value="{{ old('title') }}" required>
    </div>

    <div>
        <label for="description">Descripción:</label>
        <textarea name="description" id="description" required>{{ old('description') }}</textarea>
    </div>

    <div>
        <button type="submit">Crear comunidad</button>
    </div>
</form>