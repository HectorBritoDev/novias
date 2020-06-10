<form action="{{ route('tag.destroy',$tag->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="delete" type="submit"></button>
</form>
