<form action="{{ route('style.destroy',$style->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="delete" type="submit"></button>
</form>
