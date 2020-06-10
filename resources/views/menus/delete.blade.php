<form action="{{ route('menu.destroy',$menu->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="button is-danger is-rounded" type="submit">Eliminar</button>
</form>
