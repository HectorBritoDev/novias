<form action="{{ route('album.destroy', $album->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="button is-danger" type="submit">Eliminar</button>
</form>
