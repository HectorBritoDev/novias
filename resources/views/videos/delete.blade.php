<form action="{{ route('video.destroy',$user->video) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="button is-danger" type="submit">Eliminar</button>
</form>
