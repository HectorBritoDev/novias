@if ($task->status == 'incomplete')

<form action="{{ route('task.update_status',$task->id) }}" method="POST">

    <button class="button is-success is-outlined" class="button" type="submit">
        <span class="icon is-small">
            <i class="fas fa-check"></i>
        </span>
        <span><strong>¿Listo?</strong></span>
    </button>

    @csrf
    @method('PUT')
    <input type="hidden" name="status" value="1">
</form>

@else
<form action="{{ route('task.update_status',$task->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input class="button" type="hidden" name="status" value="0">
    <button class="button is-danger is-outlined" type="submit">¡Aun No!</button>
</form>
@endif
