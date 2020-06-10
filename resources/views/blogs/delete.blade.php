<form action="{{ route('blog.destroy',$article->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="button is-danger" type="submit">
    	Eliminar
    </button>
</form>
