@if ($user->status==0)

<form action="{{ route('user.update',$user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="status" value="1">
    <button class="button is-success">Aprobar</button>
</form>
@else
<form action="{{ route('user.update',$user->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="status" value="0">
    <button class="button is-danger">Desaprobar</button>
</form>

@endif
