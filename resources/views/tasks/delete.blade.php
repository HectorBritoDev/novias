@if (auth()->user()->is_user)

<form action="{{ route('task.destroy',$task->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="button is-danger" type="submit">
        <span>Borrar</span>
        <span class="icon is-small">
            <i class="fas fa-times"></i>
        </span>
    </button>
</form>

@endif
