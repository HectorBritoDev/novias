<form action="{{ route('spend.destroy',$spend->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="button is-danger is-outlined is-fullwidth" type="submit">Borrar</button>
</form>
