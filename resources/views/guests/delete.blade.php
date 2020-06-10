<form action="{{ route('guest.destroy',$guest->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="button is-danger" type="submit">Eliminar</button>
</form>
