<form action="{{ route('weather.destroy',$weather->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="delete" type="submit"></button>
</form>
