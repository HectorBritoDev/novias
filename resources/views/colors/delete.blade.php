<form action="{{ route('color.destroy',$color->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="delete" type="submit">Borrar</button>
</form>
