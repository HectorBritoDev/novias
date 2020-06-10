<form action="{{ route('photo.destroy',$photo->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="delete" type="submit">Eliminar</button>
</form>
