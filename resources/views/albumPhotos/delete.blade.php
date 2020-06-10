<form action="{{ route('albumPhoto.destroy', $photo->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="button is-danger" type="submit">Eliminar</button>
</form>
