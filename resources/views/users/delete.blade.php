<form action="{{ route('user.destroy',$user->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="button is-danger" type="submit">Eliminar</button>
</form>
